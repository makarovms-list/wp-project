<script>
	jQuery(document).ready(function() {
		jQuery('#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?> select').selectric();
		jQuery("#button-<?php print $template_data['element_fields']['id']?>").on('click', function(event) {
            jQuery("#<?php print $template_data['element_fields']['id']?>").find('video').trigger('pause');
            jQuery("#<?php print $template_data['element_fields']['id']?>").find('iframe').each(function(){
                jQuery("#<?php print $template_data['element_fields']['id']?>").find('iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            });
			jQuery("#<?php print $template_data['element_fields']['id']?> .m-video-wrapper").addClass("hidden");
			jQuery("#<?php print $template_data['element_fields']['id']?> .m-data-container").addClass("hidden");
			jQuery("#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>").removeClass("hidden");
			event.preventDefault();
		});
		jQuery("form.schedule-demo-popup a.back").on('click', function(event) {
			jQuery("#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>").addClass("hidden");
            jQuery("#<?php print $template_data['element_fields']['id']?> .m-video-wrapper").removeClass("hidden");
			jQuery("#<?php print $template_data['element_fields']['id']?> .m-data-container").removeClass("hidden");
			event.preventDefault();
		});
        jQuery(".thankyou a.back").on('click', function(event) {
            jQuery("#<?php print $template_data['element_fields']['id']?> .m-video-wrapper").addClass("hidden");
			jQuery("#<?php print $template_data['element_fields']['id']?> .m-data-container").addClass("hidden");
            jQuery("#<?php print $template_data['element_fields']['id']?> .thankyou").addClass("hidden");
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").removeClass('hidden');
			event.preventDefault();
		});
        jQuery(".result-select-date a.back").on('click', function(event) {
            jQuery("#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>").removeClass("hidden");
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").addClass('hidden');
			event.preventDefault();
		});
        jQuery(".result-scheduled a.back").on('click', function(event) {
        	jQuery("#<?php print $template_data['element_fields']['id']?> .result-scheduled").addClass('hidden');
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").removeClass('hidden');
			event.preventDefault();
		});
		jQuery("#form-<?php print $template_data['element_fields']['id']?>").on('submit', function(event) {
            jQuery("#<?php print $template_data['element_fields']['id']?>").find('video').trigger('pause');
            jQuery("#<?php print $template_data['element_fields']['id']?>").find('iframe').each(function(){
                jQuery("#<?php print $template_data['element_fields']['id']?>").find('iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            });
			jQuery("#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>").addClass("hidden");
			/*jQuery("#<?php print $template_data['element_fields']['id']?> .thankyou").removeClass("hidden");*/
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").removeClass('hidden');
            var formFieldData = jQuery(this).serializeArray();
            console.log(formFieldData);
            jQuery.ajax({
                type: 'POST',
                url: 'https://analytics.clickdimensions.com/forms/h/an9VJeTDMUmqUWS9tVNHWA',
                data: jQuery(this).serialize(),
                dataType: 'json',
                success: function (result) {
                  petrosoftSendGtmEvent('schedule-demo-popup-submit');
                },
                error: function (result) {
                    petrosoftSendGtmEvent('schedule-demo-popup-submit');
                    /*
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> input[type=text]').val('');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> input[type=email]').val('');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> input[type=tel]').val('');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> select').each(function (indx) {
                        jQuery(this).children('option:first').prop('selected', true);
                        jQuery(this).selectric();
                    });
                    */
                    /*
                    jQuery("#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>").addClass("hidden");
                    jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").removeClass('hidden');
                    jQuery("#<?php print $template_data['element_fields']['id']?> .result").addClass('hidden');
                    */
                }
            });
			event.preventDefault();
		});

		jQuery('#<?php print $template_data['element_fields']['id']?> #select-time').selectric();

        jQuery("#<?php print $template_data['element_fields']['id']?> #select-date")
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
        
        jQuery("#<?php print $template_data['element_fields']['id']?>  #select-date").selectric().on('change', function() {
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
                    'day': '17',
                    'month': '06',
                    'year': '2020',
                    'security': ''
                },
                success: function(data){		
                    console.log(data);
                },
                error: function(data){
                    jQuery("#<?php print $template_data['element_fields']['id']?>  #select-time").find('option').remove();
                    jQuery("#<?php print $template_data['element_fields']['id']?>  #select-time").append("<option value='-1'>Time *</option>");
                    var json = data.responseText.slice(0, -1);
                    var obj = jQuery.parseJSON(json);
                    jQuery.each(obj.TimeSlots,function(index,value){
                      jQuery("#<?php print $template_data['element_fields']['id']?>  #select-time").append("<option value='"+value.Name+"'>"+value.Name+"</option>");
                    });
					jQuery("#<?php print $template_data['element_fields']['id']?> #select-time").selectric('refresh');
                }
                
           });
        });

        jQuery("#<?php print $template_data['element_fields']['id']?> #no-thanks").live("click", function(e){
            jQuery("#<?php print $template_data['element_fields']['id']?> form").addClass('hidden');
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").addClass('hidden');
            jQuery("#<?php print $template_data['element_fields']['id']?> .thankyou").removeClass('hidden');
            e.preventDefault();
        });

        jQuery("#<?php print $template_data['element_fields']['id']?> #add-appointment").live("click", function(e){
            petrosoftSendGtmEvent('schedule-demo-popup-post-click');
            jQuery("#<?php print $template_data['element_fields']['id']?> form").addClass('hidden');
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-select-date").addClass('hidden');
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-scheduled").removeClass('hidden');
            jQuery("#<?php print $template_data['element_fields']['id']?> .result-scheduled p span").html(jQuery("#<?php print $template_data['element_fields']['id']?> .selectric-select-date span.label").html() + ' ' + jQuery("#<?php print $template_data['element_fields']['id']?> #select-time option:selected").val());            
            e.preventDefault();
        });

	});	
</script>
<style>



.hidden {display: none!important;}
.video-modal-content a {cursor: pointer;}
form.schedule-demo-popup input[type=text], form.schedule-demo-popup input[type=email],  form.schedule-demo-popup input[type=tel] {display: block;background: #FFFFFF;border: 1px solid #CAD3DE;box-sizing: border-box;border-radius: 6px;padding: 11px 10px;margin-bottom: 20px;width: 100%;font-size: 18px;color: #000;font-family: Lato,sans-serif;display: inline-block;vertical-align: top;line-height: 22px;}
form.schedule-demo-popup select {display: block;background: #FFFFFF;border: 1px solid #CAD3DE;box-sizing: border-box;border-radius: 6px;padding: 17px 10px;margin-bottom: 20px;width: 100%;}
form.schedule-demo-popup input[type=submit] {width: 100%;cursor: pointer;border: none;font-family: Lato,sans-serif;width: auto;/*margin-left: calc(50% - 115px);*/} 
form.schedule-demo-popup .selectric-wrapper {padding-bottom: 20px;}
form.schedule-demo-popup .selectric-wrapper .selectric {padding: 5px 0;}
form.schedule-demo-popup .selectric-petrosoft-select .selectric-items li:after {display: none!important;}
form.schedule-demo-popup .error {position: absolute;margin-top: -21px;color: red;font-size: 14px;}
form.schedule-demo-popup {max-width: calc(100% - 32px)!important;}
form.schedule-demo-popup input {max-width: calc(50% - 16px);}    
form.schedule-demo-popup input:nth-child(odd) {margin-right: 16px;}
#<?php print $template_data['element_fields']['id']?> .selectric-petrosoft-select {width: calc(50% - 16px);display: inline-block;vertical-align: top;}
#<?php print $template_data['element_fields']['id']?> .selectric-petrosoft-select:nth-child(odd) {margin-right: 16px;}
#<?php print $template_data['element_fields']['id']?> .selectric-wrapper {width: calc(50% - 16px);display: inline-block;vertical-align: top;}
#<?php print $template_data['element_fields']['id']?> .selectric-wrapper:nth-child(odd) {margin-right: 16px;}
form.schedule-demo-popup span.agree {margin-bottom: 20px;display: block;}
.thankyou {text-align: center;margin: 0 auto;}
.thankyou .img_wrapper .img_block {display: inline-block;vertical-align: top;margin: 0 32px;}
.thankyou .img_wrapper .img_block p {line-height: 26px!important;}
.result-scheduled {text-align: center;margin: 0 auto;}
.result-scheduled .img_wrapper .img_block {display: inline-block;vertical-align: top;/*margin: 0 32px;*/}
.result-scheduled .img_wrapper .img_block p {line-height: 26px!important;}
/*.result-scheduled a.back, .result-select-date a.back, .thankyou a.back, form.schedule-demo-popup a.back {font-size: 18px;line-height: 22px;text-align: center;padding: 16px 33px 16px 34px;color: #fff;text-decoration: none;background-color: #3E74E7;transition: all .3s linear 0s;display: -webkit-inline-box;display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;-webkit-box-pack: center;-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-webkit-align-items: center;-ms-flex-align: center;align-items: center;border-radius: 6px;box-sizing: border-box;float: right;min-width: 233px;}*/
.result-scheduled, .result-select-date, .thankyou, form.schedule-demo-popup {position: relative;padding-top: 50px!important;}
.result-scheduled a.back, .result-select-date a.back, .thankyou a.back, form.schedule-demo-popup a.back {background: url(/wp-content/themes/petrosoftinc/images/go-back-link.png) 0px 0px no-repeat;background-size: 34px;position: absolute;top: 0;left: 0;font-family: Lato;font-style: normal;font-weight: normal;font-size: 18px;line-height: 34px;text-transform: capitalize;color: #727E8E;padding-left: 45px;}  
.result-scheduled a.back:hover, .result-select-date a.back:hover, .thankyou a.back, form.schedule-demo-popup a.back:hover {background: url(/wp-content/themes/petrosoftinc/images/go-back-link.png) 0px 0px no-repeat;background-size: 34px;}
/*.result-scheduled a.back:hover, .result-select-date a.back:hover, .thankyou a.back, form.schedule-demo-popup a.back:hover {background-color: #1752D0;transition: all .3s linear 0s;text-decoration: none;}*/
.selectric .label {text-transform: initial!important;color: #000!important;font-size: 18px!important;line-height: 46px!important;height: 46px!important;margin-left: 10px!important;}

@media (max-width: 576px) {
    form.schedule-demo-popup input {max-width: 100%!important;margin-right: 0px!important;}
    #<?php print $template_data['element_fields']['id']?> .selectric-petrosoft-select {width: 100%!important;margin-right: 0px!important;}
}
.schedule-demo-popup .selectric-petrosoft-select .selectric .label {text-transform: capitalize!important;line-height: 34px!important;color: #000!important;height: 34px!important;margin-left: 10px!important;font-size: 18px!important;}
.schedule-demo-block p.a-center {text-align: center;}
#schedule-a-demo  .selectric-petrosoft-select .selectric .label {text-transform: initial!important;color: #000!important;font-size: 18px!important;line-height: 46px!important;height: 48px!important;margin-left: 10px!important;}
#<?php print $template_data['element_fields']['id']?> #add-appointment {font-size: 18px;line-height: 22px;text-align: center;padding: 16px 33px 16px 34px;color: #fff;text-decoration: none;background-color: #3E74E7;transition: all .3s linear 0s;display: -webkit-inline-box;display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;-webkit-box-pack: center;-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-webkit-align-items: center;-ms-flex-align: center;align-items: center;border-radius: 6px;box-sizing: border-box;min-width: 233px;}
#<?php print $template_data['element_fields']['id']?> #add-appointment:hover {background: rgba(62, 116, 231, 0.8);}



#<?php print $template_data['element_fields']['id']?> #no-thanks {font-size: 18px;line-height: 22px;text-align: center;padding: 16px 33px 16px 34px;color: #3E74E7;text-decoration: none;background-color: #fff;transition: all .3s linear 0s;display: -webkit-inline-box;display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;-webkit-box-pack: center;-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-webkit-align-items: center;-ms-flex-align: center;align-items: center;border-radius: 6px;box-sizing: border-box;min-width: 233px;}

#<?php print $template_data['element_fields']['id']?> .result-select-date a.back {margin-top: 24px;}


.schedule-demo-block h3 {position: relative;padding-left: 34px!important;margin-top: 0px;color: #fff!important;font-family: latoheavy;padding: 6px 0 7px 34px;font-size: 24px;}
.schedule-demo-block h3:after {content: '';position: absolute;width: 6px;height: 100%;left: 0;top: 0;background-color: #fff!important;}
p.time-date-container {font-size: 22px;}
@media (min-width: 1199px) {
    .result-scheduled a.back, .result-select-date a.back, .thankyou a.back, form.schedule-demo-popup a.back {top: -30px!important;}
    .result-scheduled, .result-select-date, .thankyou, form.schedule-demo-popup {padding-top: 20px!important;}
}
</style>
<div id="<?php print $template_data['element_fields']['id']?>" class="modal schedule-demo-popup">
    <div class="video-modal-content">
        <div class="m-video-wrapper">
            <div class='video-embed-container'>
                <?php if (isset($template_data['element_fields']['video']) && $template_data['element_fields']['video'] != ''):?>
                    <video style="width: 100%" controls>
                        <source src="<?php print $template_data['element_fields']['video']; ?>" type="video/mp4">
                        Your browser doesn't support HTML5 video tag.
                    </video>
                <?php endif ?>
            </div>
            <a id="button-<?php print $template_data['element_fields']['id']?>" class="btn schedule-demo-popup-show-form"><?php print $template_data['element_fields']['button_label'] ?></a>
        </div>
        <div class="m-data-container">
            <div class="m-title">
                <?php print $template_data['element_fields']['title'] ?>
            </div>
            <div class="m-description">
                <?php print $template_data['element_fields']['description'] ?>
            </div>
        </div>
        <form class="hidden schedule-demo-popup" id="form-<?php print $template_data['element_fields']['id']?>" data-action="https://analytics.clickdimensions.com/forms/h/an9VJeTDMUmqUWS9tVNHWA">
            <input name="001" id="001" type="text" placeholder="First Name *" value="" required />
            <input name="002" id="002" type="text" placeholder="Last Name *" value="" required />
            <input name="004" id="004" type="email" placeholder="E-mail *" value="" required />
            <input name="501" id="501" type="tel" placeholder="Phone *" value="" required />
            <input name="006" id="006" type="text" placeholder="Job Tile *" value="" required />
            <input name="005" id="005" type="text" placeholder="Company *" value="" required />
            <select class="petrosoft-select hidden" name="011" id="011" required />
                <option value="-1">Number of Locations *</option>
                <option value="100000000">1</option>
                <option value="100000001">2 - 4</option>
                <option value="100000002">5 - 20</option>
                <option value="100000003">21 - 99</option>
                <option value="100000004">100+</option>
            </select>
            <select class="petrosoft-select hidden" name="003" id="003" required />
                <option value="-1">Business Type *</option>
                <option value="100000000">C-Store</option>
                <option value="100000001">C-Store w/Fuel</option>
                <option value="100000002">Beer Distributior</option>
                <option value="100000003">Liquor Store</option>
                <option value="100000004">Fast Food</option>
                <option value="100000005">Service Shop</option>
                <option value="100000006">Other</option>
                <option value="100000007">N/A</option>
            </select>
            <input name="012" id="012" type="hidden" placeholder="Product" value="<?php print $template_data['element_fields']['productid'] ?>" required />
            <input name="013" id="013" type="hidden" placeholder="Leadsource" value="<?php print $template_data['element_fields']['leadsourceid'] ?>" required />
            <span class="agree"><input checked name="099" id="099" class="petrosoft-checkbox" required type="checkbox" value="agree">  <label for="099">I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information*</label></span>
            <!--<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />-->
            <input name="source" id="source" type="hidden" value="campaign">
            <input type="submit" class="btn" value="SCHEDULE A DEMO">
            <a class="back">Back</a>
        </form>

        <div class="result-select-date hidden">
            <p><b>Thank you for requesting a demo</b>! A member of the Petrosoft team will contact you very soon to finalize the date and time for your demo.</p>
            <h3>Would you like to schedule a demo now?</h3>
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
                <a class="back">Back</a>
            </p>
        </div>

        <div class="result-scheduled hidden">
            <p><b>Thank you for requesting a demo</b> to learn more about our solutions and partnering with us will help drive success for your business!</p>
            <p class="time-date-container">Your demo is scheduled for <span class="time-date"></span>.</p>
            <p style="margin-top:20px;"><strong>Questions about our products or solutions?</strong></p>
            <div class="img_wrapper">
                <div class="img_block">
                    <img alt="Give us a call" src="/wp-content/uploads/2020/04/icon_001.png" />
                    <p>Give us a call<br><b>412-306-0640</b><br>option 1</p>
                </div>
                <div class="img_block">
                    <img alt="Contact our sales" src="/wp-content/uploads/2020/04/icon_002.png" />
                    <p>Contact our sales representative<br>via <a href="#" class="live-chat">Live Chat </a></p>
                </div>
                <div class="img_block">
                    <img alt="Send us an E-mail" src="/wp-content/uploads/2020/04/icon_003.png" />
                    <p>Send us an E-mail<br><a href="mailto:info@petrosoftinc.com" target="_blank">info@petrosoftinc.com</a></p>
                </div>
            </div>
            <a class="back">Back</a>
        </div>

        <div class="hidden thankyou">
            <p>Thank you for contacting Petrosoft!</p>
            <p>A member of the Petrosoft team will follow-up with you to answer your questions.</p>
            <p style="margin-top:20px;"><strong>Questions about our products or solutions?</strong></p>
            <div class="img_wrapper">
                <div class="img_block">
                    <img alt="Give us a call" src="/wp-content/uploads/2020/04/icon_001.png" />
                    <p>Give us a call<br><b>412-306-0640</b><br>option 1</p>
                </div>
                <div class="img_block">
                    <img alt="Contact our sales" src="/wp-content/uploads/2020/04/icon_002.png" />
                    <p>Contact our sales representative<br>via <a href="#" class="live-chat">Live Chat </a></p>
                </div>
                <div class="img_block">
                    <img alt="Send us an E-mail" src="/wp-content/uploads/2020/04/icon_003.png" />
                    <p>Send us an E-mail<br><a href="mailto:info@petrosoftinc.com" target="_blank">info@petrosoftinc.com</a></p>
                </div>
            </div>
            <a class="back">Back</a>
        </div>
    </div>
</div>
