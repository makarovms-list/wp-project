<script>
    jQuery(document).ready(function() {
      
      var validationMessages = {};

       $('form#schedule-a-demo').find('input,select').each(function(){  // add more type hear

          var singleElementMessages = {};

          var fieldName = $(this).attr('name');

          if(!fieldName){  //field Name is not defined continue ;
              return true;
          }

          // If attr data-error-field-name is given give it a priority , and then to placeholder and lastly a simple text

          var fieldPlaceholderName = $(this).data('error-field-name') || $(this).attr('placeholder') || "This Field";

          if( $( this ).prop( 'required' )){

              singleElementMessages['required'] = $(this).data('error-required-message') || $(this).data('error-message')  || fieldPlaceholderName + " is required";

          }     

          validationMessages[fieldName] = singleElementMessages;

       });
      
      
      jQuery("form#schedule-a-demo").validate({
            rules: {
                '501': {
                    phoneUS: true,

                },
                '004': {
                    required: true,
                    emailfull: true,
                }
            },
            messages     : validationMessages, 
            errorLabelContainer: '.errorTxt',
            submitHandler: function(form) {

                var formFieldData = jQuery(form).serializeArray();
                console.log(formFieldData);
                jQuery.ajax({
                    type: 'POST',
                    url: 'https://analytics.clickdimensions.com/forms/h/an9VJeTDMUmqUWS9tVNHWA',
                    data: jQuery(form).serialize(),
                    dataType: 'json',
                    success: function (result) {
                      petrosoftSendGtmEvent('schedule-demo-submit');
                    },
                    error: function (result) {
                        //jQuery('body').addClass('success_send_form');
                        /*
                        jQuery('.schedule-demo-block form input[type=text]').val('');
                        jQuery('.schedule-demo-block form input[type=email]').val('');
                        jQuery('.schedule-demo-block form input[type=tel]').val('');
                        jQuery('.schedule-demo-block form select').each(function (indx) {
                            jQuery(this).children('option:first').prop('selected', true);
                            jQuery(this).selectric();
                        });
                        */
                        petrosoftSendGtmEvent('schedule-demo-submit');
                        jQuery('.schedule-demo-block form').addClass('hidden');
                        jQuery('.schedule-demo-block .result-select-date').removeClass('hidden');
                        jQuery('.schedule-demo-block .result').addClass('hidden');
                        
                        /*
                        setTimeout(function () {
                            jQuery('body').removeClass('success_send_form');
                        }, 3000);
                        */
                    }
                });
                jQuery.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/wp-admin/admin-ajax.php',
                    data: { 
                        'action': 'addWebLeadSource',
                        '001': jQuery(form).find('#001').val(),
                        '002': jQuery(form).find('#002').val(),
                        '501': jQuery(form).find('#501').val(),
                        '004': jQuery(form).find('#004').val(),
                        '006': jQuery(form).find('#006').val(),
                        '005': jQuery(form).find('#005').val(),
                        '011': jQuery(form).find('#011 option:selected').val(),
                        '003': jQuery(form).find('#003 option:selected').val(),
                        'security': ''
                    },
                    success: function(data){		
                        console.log(data);
                    },
                    error: function(data){
                        console.log(data)
                    }
                    
            }); 
            return false;
        }});
        jQuery.validator.addMethod("emailfull", function(value, element) {
          return this.optional(element) || /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/.test(value);
        }, "Please enter a valid email address.");
        
        $('#select-date')
          .on('selectric-before-open', function() {
            /*console.log('Before open');*/
          })
          .on('selectric-before-close', function() {
            /*console.log('Before close');*/
          })
          // You can bind to change event on original element
          .on('change', function() {
            /*console.log('Change');*/
          });
        
        $('#select-date').selectric().on('change', function() {
          console.log(jQuery(this).val());
          /*
          var year = jQuery(this).find('option:selected').attr('data-y');
            var month = jQuery(this).find('option:selected').attr('data-m');
            var day = jQuery(this).find('option:selected').attr('data-d');
            */
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/wp-admin/admin-ajax.php',
                data: { 
                    'action': 'gettimeslot',
                    'day': '27',
                    'month': '07',
                    'year': '2020',
                    'security': ''
                },
                success: function(data){		
                    console.log(data);
                },
                error: function(data){
                    jQuery('#select-time').find('option').remove();
                    jQuery("#select-time").append("<option value='-1'>Time *</option>");
                    var json = data.responseText.slice(0, -1);
                    var obj = jQuery.parseJSON(json);
                    console.log(obj);
                    var selected_date = obj.Date;
          			selected_date = selected_date.split('T');
                    jQuery.each(obj.TimeSlots,function(index,value){
                    	var employees = '';
                        var count = 0;
                    	jQuery.each(value.FreeEmployees,function(ind,val){
                        	if (count > 0) { employees += ',' }
                        	employees += '{"id": "' + val.Id + '"}'
                            count++;
                    	});
                    
                      jQuery("#select-time").append("<option data-start='"+selected_date[0]+"T"+value.Start+"' data-end='"+selected_date[0]+"T"+value.End+"' data-userids='"+employees+"' value='"+value.Name+"'>"+value.Name+"</option>");
                    });
					jQuery('#select-time').selectric('refresh');

                }
                
           });
        });
        jQuery("#no-thanks").live("click", function(e){
            jQuery('.schedule-demo-block form').addClass('hidden');
            jQuery('.schedule-demo-block .result-select-date').addClass('hidden');
            jQuery('.schedule-demo-block .result').removeClass('hidden');
            e.preventDefault();
        });

        jQuery("#add-appointment").live("click", function(e){
            jQuery('.schedule-demo-block form').addClass('hidden');
            jQuery('.schedule-demo-block .result-select-date').addClass('hidden');
            jQuery('.schedule-demo-block .result-scheduled').removeClass('hidden');
            petrosoftSendGtmEvent('schedule-demo-post-click');
            jQuery('.schedule-demo-block .result-scheduled p span').html(jQuery(".schedule-demo-block .selectric-select-date span.label").html()  + ' ' + jQuery('.schedule-demo-block #select-time option:selected').val());            
            var json = '{"startDate":"'+jQuery('.schedule-demo-block #select-time option:selected').attr("data-start")+'","endDate":"'+jQuery('.schedule-demo-block #select-time option:selected').attr("data-end")+'","contactEmail":"'+jQuery("form#schedule-a-demo #004").val()+'","userIds": ['+jQuery('.schedule-demo-block #select-time option:selected').attr("data-userids")+']}';
            /*console.log(json);*/
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/wp-admin/admin-ajax.php',
                data: { 
                    'action': 'addAppoinment',
                    'data': json,
                    'security': ''
                },
                success: function(data){		
                    console.log(data);
                },
                error: function(data){
                	console.log(data)
                }
                
            }); 
            e.preventDefault();
        });

    });
</script>
<style>
.schedule-demo-block .hidden {display: none!important;}
.schedule-demo-block form.hidden {display: none!important;}
.schedule-demo-block .img_wrapper{margin-top:20px;}
.schedule-demo-block .img_block{width: 208px;margin: 0 auto 20px auto;display: inline-block;vertical-align: top;color: #fff;margin-top: 10px;margin-right: 14px;}
.schedule-demo-block .img_block img {max-width: 65px!important;height: 40px!important;}
.schedule-demo-block .img_block p {line-height: 26px!important;font-style: normal!important;font-weight: 600!important;font-size: 18px!important;color: #FFFFFF!important;margin-top: 13px!important;}
.schedule-demo-block p {/*margin-top: 20px;*/font-size: 18px;/*line-height: 22px;*/color: #fff;width: 100%;font-weight: bold;line-height: 23px;text-align: left;/*margin-top: 52px;*/}
.schedule-demo-block a {color: #fff;textdecoration: none!important;}
#schedule-a-demo input[type=text],
#schedule-a-demo input[type=tel],
#schedule-a-demo input[type=email] {text-transform: capitalize!important;color: #000!important;font-size: 18px!important;line-height: 37px!important;height: 52px!important;}

.schedule-demo-block .selectric-wrapper:nth-child(odd) {margin-right: 1%;}
.schedule-demo-block .selectric-wrapper {padding-bottom: 0px;width: 49%;display: inline-block;}
.selectric .label {text-transform: initial!important;color: #000!important;font-size: 18px!important;line-height: 46px!important;height: 46px!important;margin-left: 10px!important;}
.selectric-wrapper.selectric-petrosoft-select {display: none!important;}

@media (max-width: 1199px) {
    .schedule-demo-block .result {padding: 0px 28px;}
    .schedule-demo-block .img_wrapper {text-align: left;}
    .schedule-demo-block .img_block {max-width: 50%;}
    .result-select-date {max-width: calc(100% - 40px)!important;padding: 20px!important;}
}
@media (max-width: 500px) {
    /*.schedule-demo-block .img_block:last-child {max-width: 100%!important;}*/
    .schedule-demo-block .selectric-wrapper:nth-child(odd) {margin-right: 0%!important;}
    .schedule-demo-block .selectric-wrapper {width: 100%!important;}
    .schedule-demo-block form input[type=email], .schedule-demo-block form input[type=tel], .schedule-demo-block form input[type=text] {width: 100%!important;}
    .selectric-wrapper.selectric-petrosoft-select {display: none!important;}
    .schedule-demo-block .img_block {width: calc(33% - 16px)!important;padding-left: 8px;padding-right: 8px;}
    .schedule-demo-block .img_block:last-child {width: calc(33% - 16px)!important;}
    .result-scheduled {padding: 0 24px!important;}
    .schedule-demo-block .img_block {width: calc(100% - 16px)!important;max-width: 100%!important;}
    .schedule-demo-block .img_block br {display: none!important}
}
@media (max-width: 320px) {
    .schedule-demo-block .img_block {width: calc(50% - 16px)!important;padding-left: 8px;padding-right: 8px;}
    .schedule-demo-block .img_block:last-child {max-width: 100%!important;}
}

.schedule-demo-block p.a-center {text-align: center;}
#schedule-a-demo  .selectric-petrosoft-select .selectric .label {text-transform: initial!important;color: #000!important;font-size: 18px!important;line-height: 46px!important;height: 48px!important;margin-left: 10px!important;}
#add-appointment {background: rgba(255,255,255,.5);cursor: pointer;border: none;font-family: Lato,sans-serif;width: auto;display: inline-block;margin: 24px auto;font-size: 18px;line-height: 22px;text-align: center;padding: 16px 33px 16px 34px;color: #fff;text-decoration: none;transition: all .3s linear 0s;border-radius: 6px;margin-left: 20px;margin-right: 20px;}
#add-appointment:hover {background: rgba(255,255,255,.8);}
#no-thanks {cursor: pointer;border: none;font-family: Lato,sans-serif;width: auto;display: inline-block;margin: 24px auto;font-size: 18px;line-height: 22px;text-align: center;padding: 16px 33px 16px 34px;color: #fff;text-decoration: none;transition: all .3s linear 0s;border-radius: 6px;margin-left: 20px;margin-right: 20px;}
/*#no-thanks:hover {background: rgba(255,255,255,.8);}*/
.schedule-demo-block h3 {position: relative;padding-left: 34px!important;margin-top: 0px;color: #fff!important;font-family: latoheavy;padding: 6px 0 7px 34px;font-size: 24px;}
.schedule-demo-block h3:after {content: '';position: absolute;width: 6px;height: 100%;left: 0;top: 0;background-color: #fff!important;}
p.time-date-container {/*font-size: 22px;*/font-weight: 800;font-size: 24px;line-height: 23px!important;color: #FFFFFF;text-align: left;margin-top: 52px;margin-bottom: 62px!important;}
#schedule-demo-block .selectric-input+.selectric-wrapper {margin-top: 20px!important;}
p.time-date-container {/*line-height: 32px!important;*/}
.schedule-demo-block p.select-time {font-weight: 800;line-height: 25px;}

</style>
<div id="schedule-demo-block" class="schedule-demo-block" style="background-color: <?php print $template_data['fields']['schedule_demo']['mobile_background'];?>">
    <div data-aos="fade-right" class="sd-content">
        <div class="left-container">
            <div class="sh-title"><?php print $template_data['fields']['schedule_demo']['content']; ?></div>
            <form id="schedule-a-demo" method="POST" data-action="https://analytics.clickdimensions.com/forms/h/an9VJeTDMUmqUWS9tVNHWA">
                <?php if(is_array($template_data['fields']['schedule_demo']['form'])):?>
                    <?php foreach ($template_data['fields']['schedule_demo']['form'] as $item):?>
                        <?php
                        $name_variable_for_request = $item['name_variable_for_request'];
                        $placeholder = $item['placeholder'];
                        $default_value = $item['default_value'];
                        $element_type = $item['element_type'];
                        $values_for_select_type = $item['values_for_select_type'];
                        $requrid_val = $item['requrid'];
                        $hide_show_on_the_form = $item['hide_show_on_the_form'];
                        if ($hide_show_on_the_form == 'Hide') {
                            ?>
                            <input name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" type="hidden" placeholder="<?php print $placeholder; ?>" value="<?php print $default_value; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> />
                            <?php
                        } else {
                            switch ($item['element_type']) {
                                case "text":
                                    ?>
                                    <input name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" type="text" placeholder="<?php print $placeholder; ?>" value="<?php print $default_value; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> />
                                    <?php
                                    break;
                                case "email":
                                    ?>
                                    <input name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" type="email" placeholder="<?php print $placeholder; ?>" value="<?php print $default_value; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> />
                                    <?php
                                    break;
                                case "tel":
                                    ?>
                                    <input name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" type="tel" placeholder="<?php print $placeholder; ?>" value="<?php print $default_value; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> />
                                    <?php
                                    break;
                                case "select":
                                    ?>
                                    <select class="petrosoft-select" name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> >
                                        <?php
                                        $json = '{'.$values_for_select_type.'}';
                                        $array = json_decode($json);
                                        foreach ($array as $name => $value) {
                                            ?>
                                            <option value="<?php print $name; ?>" <?php if ($name === $default_value) { print 'selected="selected"'; } ?>><?php print $value; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    break;
                                case "checkbox":
                                    ?>
                                    <span class="agree"><input class="petrosoft-checkbox" name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> type="checkbox" checked value="agree"> <label for="<?php print $name_variable_for_request; ?>"><?php print $default_value; ?></label></span>
                                    <?php
                                    break;
                            }
                        }
                        ?>
                    <?php endforeach; ?>
                <?php endif;?>
                <div class="errorTxt"></div>                 
                <input name="source" id="source" type="hidden" value="campaign" />
                <input type="submit" class="btn" value="SCHEDULE A DEMO" />               
            </form>

            <div class="result-select-date hidden">
                <p><b>Thank you for requesting a demo</b>!</p>
                <p class="select-time">Would you like to schedule a demo now?</p>
                <select id="select-date" class="selectric select-date" placeholder="Date *">
                    <option value="-1">Date *</option>
                    <option data-y="2020" data-m="07" data-d="29" value="07/29/20">07/29/20</option>
                    <option data-y="2020" data-m="07" data-d="30" value="07/30/20">07/30/20</option>
                    <option data-y="2020" data-m="07" data-d="31" value="07/31/20">07/31/20</option>
                    <option data-y="2020" data-m="08" data-d="03" value="08/03/20">08/03/20</option>
                    <option data-y="2020" data-m="08" data-d="04" value="08/04/20">08/04/20</option>
                </select>
                <select id="select-time" class="selectric" placeholder="Time *"><option value="-1">Time *</option></select>
                <p>Please wait for the confirmation email and link to the video conference room from us.</p>
                <p>If you need to change the appointment, please contact us <b><a href="mailto:sales@petrosoftinc.com">sales@petrosoftinc.com</a></b></p>
                <p class="a-center">
                    <a id="add-appointment">Schedule now</a>
                    <a id="no-thanks">No, thanks</a>
                </p>
            </div>


            <div class="result-scheduled hidden">
                <p><b>Thank you for requesting a demo</b> to learn more about our solutions and partnering with us will help drive success for your business!</p>
                <p class="time-date-container">Your demo is scheduled for <span class="time-date"></span>.</p>
                <!--<p style="margin-top:20px;"><strong>Questions about our products or solutions?</strong></p>-->
                <div class="img_wrapper">
                    <div class="img_block">
                        <p align="center">
                            <img alt="Give us a call" src="/wp-content/themes/petrosoftinc/images/schedule-phone.svg" />
                        </p>
                        <p align="center">Give us a call<br><b><a href="tel:4123060640">412-306-0640</a></b> option 1</p>
                    </div>
                    <div class="img_block" style="width: 237px;">
                        <p align="center">
                            <img alt="Contact our sales" src="/wp-content/themes/petrosoftinc/images/schedule-chat.svg" />
                        </p>
                        <p align="center">Contact our sales representative via <a href="#" class="live-chat">Live Chat </a></p>
                    </div>
                    <div class="img_block">
                        <p align="center">
                            <img alt="Send us an E-mail" src="/wp-content/themes/petrosoftinc/images/schedule-mail.svg" />
                        </p>
                        <p align="center">Send us an E-mail<br> <a href="mailto:info@petrosoftinc.com" target="_blank">info@petrosoftinc.com</a></p>
                    </div>
                </div>
            </div>

            <div class="result hidden">
                <p><b>Thank you for requesting a demo</b>!</p>
                <p>A member of the Petrosoft team will contact you very soon to finalize the date and time for your demo.</p>
                <p style="margin-top:20px;"><strong>Questions about our products or solutions?</strong></p>
                <div class="img_wrapper">
                    <div class="img_block">
                        <p align="center">
                            <img alt="Give us a call" src="/wp-content/themes/petrosoftinc/images/schedule-phone.svg" />
                        </p>
                        <p align="center">Give us a call<br><b><a href="tel:4123060640">412-306-0640</a></b> option 1</p>
                    </div>
                    <div class="img_block" style="width: 237px;">
                        <p align="center">
                            <img alt="Contact our sales" src="/wp-content/themes/petrosoftinc/images/schedule-chat.svg" />
                        </p>
                        <p align="center">Contact our sales representative via <a href="#" class="live-chat">Live Chat </a></p>
                    </div>
                    <div class="img_block">
                        <p align="center">
                            <img alt="Send us an E-mail" src="/wp-content/themes/petrosoftinc/images/schedule-mail.svg" />
                        </p>
                        <p align="center">Send us an E-mail<br> <a href="mailto:info@petrosoftinc.com" target="_blank">info@petrosoftinc.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <img alt="<?php print $template_data['fields']['schedule_demo']['background']['alt'];?>" src="<?php print $template_data['fields']['schedule_demo']['background']['url'];?>" />
        </div>
    </div>
</div>
