<script>
    jQuery(document).ready(function() {
        jQuery("form#schedule-a-demo").submit(function( event ) {
            event.preventDefault();
            jQuery(this).validate();
                var formFieldData = jQuery(this).serializeArray();
                console.log(formFieldData);
                jQuery.ajax({
                    type: 'POST',
                    url: 'https://analytics.clickdimensions.com/forms/h/aoIEHQF8Jv02dOFniCZfSS',
                    data: jQuery(this).serialize(),
                    dataType: 'json',
                    success: function (result) {
                    },
                    error: function (result) {
                        var gtmEvent = jQuery("form#schedule-a-demo").data("gtm-event");
                        if (typeof gtmEvent === 'string' && gtmEvent !== '') {
                          petrosoftSendGtmEvent(gtmEvent);
                        }
                        //jQuery('body').addClass('success_send_form');
                        jQuery('.schedule-demo-block form input[type=text]').val('');
                        jQuery('.schedule-demo-block form input[type=email]').val('');
                        jQuery('.schedule-demo-block form input[type=tel]').val('');
                        jQuery('.schedule-demo-block form select').each(function (indx) {
                            jQuery(this).children('option:first').prop('selected', true);
                            jQuery(this).selectric();
                        });
                        jQuery('.schedule-demo-block form').addClass('hidden');
                        jQuery('.schedule-demo-block .result').removeClass('hidden');
                        /*
                        setTimeout(function () {
                            jQuery('body').removeClass('success_send_form');
                        }, 3000);
                        */
                    }
                });

            return false;
        });
    });
</script>
<style>
.schedule-demo-block .hidden {display: none!important;}
.schedule-demo-block form.hidden {display: none!important;}
.schedule-demo-block .img_wrapper{margin-top:20px;}
.schedule-demo-block .img_block{width: 208px;margin: 0 auto 20px auto;display: inline-block;vertical-align: top;color: #282e37;margin-top: 10px;}
.schedule-demo-block .img_block img {max-width: 65px!important;}
.schedule-demo-block p {margin-top: 20px;font-size: 18px;line-height: 22px;color: #282e37;width: 100%;}
.schedule-demo-block a {color: #282e37;text-decoration: none!important;}
#schedule-demo-block .sh-title h2 {color: #282e37!important;}
.line-title:after {background-color: #3E74E7!important;}
#schedule-a-demo input[type=submit] {background: rgba(62, 116, 231, 0.8)!important;}
#schedule-a-demo input[type=submit]:hover {background: rgba(62, 116, 231, 1)!important;}
.schedule-demo-block textarea {background: #FFF;border: 1px solid #CAD3DE;border-radius: 6px;padding: 17px 10px;width: 100%;font-size: 14px;color: #727e8e;font-family: Lato,sans-serif;display: inline-block;resize: none;height: 120px;max-width: -webkit-calc(100% - 16px);max-width: calc(100% - 16px);}
#schedule-demo-block .sh-title h2:after {background-color: #3E74E7!important;}
.schedule-demo-block form textarea, .schedule-demo-block form input[type=email], .schedule-demo-block form input[type=tel], .schedule-demo-block form input[type=text] {color: #000!important;}
</style>
<div id="schedule-demo-block" class="schedule-demo-block" style="background-color: <?php print $template_data['fields']['form_block']['mobile_background'];?>">
    <div data-aos="fade-right" class="sd-content">
        <div class="left-container">
            <div class="sh-title"><?php print $template_data['fields']['form_block']['content']; ?></div>
            <form id="schedule-a-demo" data-gtm-event="<?php print $template_data['fields']['form_block']['gtm_event'];?>" data-action="https://analytics.clickdimensions.com/forms/h/aoIEHQF8Jv02dOFniCZfSS">
                <?php if(is_array($template_data['fields']['form_block']['form'])):?>
                    <?php foreach ($template_data['fields']['form_block']['form'] as $item):?>
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
                                    <input name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" type="text" placeholder="<?php print $placeholder; ?>" value="<?php print $default_value; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> <?php if ($name_variable_for_request == '022') { print 'style="width: 100%;"'; }?> />
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
                                case "textarea":
                                    ?>
                                    <textarea name="<?php print $name_variable_for_request; ?>" id="<?php print $name_variable_for_request; ?>" <?php if ($requrid_val == 'Yes') { print 'required'; }?> placeholder="<?php print $placeholder; ?>" value="<?php print $default_value; ?>"></textarea>
                                    <?php
                                    break;
                            }
                        }
                        ?>
                    <?php endforeach; ?>
                <?php endif;?>
                <?php $button_title = (empty($template_data['fields']['form_block']['button_title'])) ? 'SCHEDULE A DEMO' : $template_data['fields']['form_block']['button_title']; ?>
                <input name="source" id="source" type="hidden" value="campaign" />
                <input type="submit" class="btn" value="<?php print $button_title; ?>" />
            </form>
            <div class="result hidden">
                <p><b>Thank you for requesting a demo</b> to learn more about our solutions and partnering with us will help drive success for your business!</p>
                <p>A member of the Petrosoft team will contact you very soon to finalize the date and time for your demo.</p>
                <p style="margin-top:20px;"><strong>Questions about our products or solutions?</strong></p>
                <div class="img_wrapper">
                    <div class="img_block">
                        <p align="center">
                            <img src="/wp-content/uploads/2020/04/icon_001.png" />
                        </p>
                        <p align="center">Give us a call</p>
                        <p align="center"><b><a href="tel:4123060640">412-306-0640</a></b></p>
                        <p align="center">option 1</p>
                    </div>
                    <div class="img_block">
                        <p align="center">
                            <img src="/wp-content/uploads/2020/04/icon_002.png" />
                        </p>
                        <p align="center">Contact our sales representative</p>
                        <p align="center">via <a href="#" class="live-chat">Live Chat </a></p>
                    </div>
                    <div class="img_block">
                        <p align="center">
                            <img src="/wp-content/uploads/2020/04/icon_003.png" />
                        </p>
                        <p align="center">Send us an E-mail</p>
                        <p align="center"><a href="mailto:info@petrosoftinc.com" target="_blank">info@petrosoftinc.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <img alt="<?php print $template_data['fields']['form_block']['background']['alt'];?>" src="<?php print $template_data['fields']['form_block']['background']['url'];?>" />
        </div>
    </div>
</div>