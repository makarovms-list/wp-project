<script>
	jQuery(document).ready(function() {
		jQuery('#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?> select').selectric();
        jQuery('#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>').removeClass('hidden');
		jQuery("#form-<?php print $template_data['element_fields']['id']?>").on('submit', function(event) {
			jQuery("#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>").addClass("hidden");
            jQuery('#<?php print $template_data['element_fields']['id']?> #form-<?php print $template_data['element_fields']['id']?>').removeClass('not-hidden');
			jQuery("#<?php print $template_data['element_fields']['id']?> .thankyou").removeClass("hidden");
            var formFieldData = jQuery(this).serializeArray();
            console.log(formFieldData);
            var action = jQuery(this).data('action'); 
            jQuery.ajax({
                type: 'POST',
                url: action,
                data: jQuery(this).serialize(),
                dataType: 'json',
                success: function (result) {
                  petrosoftSendGtmEvent('schedule-demo-popup-submit');
                },
                error: function (result) {
                    petrosoftSendGtmEvent('schedule-demo-popup-submit');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> input[type=text]').val('');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> input[type=email]').val('');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> input[type=tel]').val('');
                    jQuery('#form-<?php print $template_data['element_fields']['id']?> select').each(function (indx) {
                        jQuery(this).children('option:first').prop('selected', true);
                        jQuery(this).selectric();
                    });
                }
            });
			event.preventDefault();
		});
	});	
</script>
<style>
.video-modal-content a {cursor: pointer;}
form.schedule-demo-popup input[type=text], form.schedule-demo-popup input[type=email],  form.schedule-demo-popup input[type=tel] {display: block;background: #FFFFFF;border: 1px solid #CAD3DE;box-sizing: border-box;border-radius: 6px;padding: 17px 10px;margin-bottom: 20px;width: 100%;font-size: 14px;color: #727e8e;font-family: Lato,sans-serif;display: inline-block;vertical-align: top;text-transform: capitalize!important;color: #000!important;font-size: 18px!important;line-height: 42px!important;height: 52px!important;}
form.schedule-demo-popup select {display: block;background: #FFFFFF;border: 1px solid #CAD3DE;box-sizing: border-box;border-radius: 6px;padding: 17px 10px;margin-bottom: 20px;width: 100%;}
form.schedule-demo-popup input[type=submit] {width: 100%;cursor: pointer;border: none;font-family: Lato,sans-serif;width: auto;margin-left: calc(50% - 115px);} 
form.schedule-demo-popup .selectric-wrapper {padding-bottom: 20px;}
form.schedule-demo-popup .selectric-wrapper .selectric {padding: 5px 0;}
form.schedule-demo-popup .selectric-petrosoft-select .selectric-items li:after {display: none!important;}
form.schedule-demo-popup .error {position: absolute;margin-top: -21px;color: red;font-size: 14px;}
form.schedule-demo-popup {max-width: calc(100% - 32px)!important;}
form.schedule-demo-popup input {max-width: calc(50% - 16px);}
form.schedule-demo-popup input:nth-child(odd) {margin-right: 16px;}
form.schedule-demo-popup .selectric-petrosoft-select {width: calc(50% - 16px);display: inline-block;vertical-align: top;}
form.schedule-demo-popup .selectric-petrosoft-select:nth-child(odd) {margin-right: 16px;}
form.schedule-demo-popup span.agree {margin-bottom: 20px;display: block;}
form.schedule-demo-popup textarea {background: #FFFFFF;border: 1px solid #CAD3DE;box-sizing: border-box;border-radius: 6px;padding: 17px 10px;margin-bottom: 20px;width: 100%;font-size: 14px;color: #727e8e;font-family: Lato,sans-serif;display: inline-block;vertical-align: top;resize: none;height: 120px;max-width: calc(100% - 16px);color: #000!important;font-size: 18px!important;}
.not-hidden {display: block!important;}
.hidden {display: none;}
.thankyou {text-align: center;margin: 0 auto;}
.thankyou .img_wrapper .img_block {display: inline-block;vertical-align: top;margin: 0 32px;}
@media (max-width: 576px) {
    form.schedule-demo-popup input {max-width: 100%!important;margin-right: 0px!important;}
    form.schedule-demo-popup .selectric-petrosoft-select {width: 100%!important;margin-right: 0px!important;}
}
form.schedule-demo-popup .selectric-petrosoft-select .selectric .label {text-transform: capitalize!important;color: #000!important;font-size: 18px!important;line-height: 42px!important;height: 40px!important;margin-left: 10px!important;}
</style>
<div id="<?php print $template_data['element_fields']['id']?>" class="modal">
    <div class="video-modal-content">
        <form class="schedule-demo-popup not-hidden" id="form-<?php print $template_data['element_fields']['id']?>" data-action="https://analytics.clickdimensions.com/forms/h/a2ylg9fhHUm8F4t5G2GtA">
            <input name="001" id="001" type="text" placeholder="First Name *" value="" required />
            <input name="002" id="002" type="text" placeholder="Last Name *" value="" required />
            <input name="004" id="004" type="email" placeholder="E-mail *" value="" required />
            <input name="501" id="501" type="tel" placeholder="Phone *" value="" required />
            <input name="005" id="005" type="text" placeholder="Company *" value="" required />
            <select id="012" class="petrosoft-select" name="012" required>
                <option value="-1">Product *</option>
                <option value="100000000">Back-Office</option>
                <option value="100000005">Point Of Sale</option>
                <option value="100000006">Food Service</option>
                <option value="100000007">Loss Prevention Analytics</option>
                <option value="100000008">Petrosoft Enterprise</option>
                <option value="100000001">Inventory</option>
                <option value="100000002">Services</option>
                <option value="100000003">Other</option>
            </select>
            <textarea id="007" name="007" placeholder="Your Question *" required></textarea>
            <input name="013" id="013" type="hidden" placeholder="Leadsource" value="<?php print $template_data['element_fields']['leadsourceid'] ?>" required />
            <span class="agree"><input class="petrosoft-checkbox" checked name="099" id="099" required type="checkbox" value="agree">  <label for="099">I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information*</label></span>
            <!--<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />-->
            <input name="source" id="source" type="hidden" value="campaign">
            <input type="submit" class="btn" value="SCHEDULE A DEMO">
        </form>
        <div class="hidden thankyou">
            <p>Thank you for contacting Petrosoft!</p>
            <p>A member of the Petrosoft team will follow-up with you to answer your questions.</p>
            <p style="margin-top:20px;"><strong>Questions about our products or solutions?</strong></p>
            <div class="img_wrapper">
                <div class="img_block">
                    <img src="/wp-content/uploads/2020/04/icon_001.png" />
                    <p>Give us a call</p>
                    <p><b>412-306-0640</b></p>
                    <p>option 1</p>
                </div>
                <div class="img_block">
                    <img src="/wp-content/uploads/2020/04/icon_002.png" />
                    <p>Contact our sales representative</p>
                    <p>via <a href="https://lc.chat/now/10776987/" target="_blank">Live Chat</a></p>
                </div>
                <div class="img_block">
                    <img src="/wp-content/uploads/2020/04/icon_003.png" />
                    <p>Send us an E-mail</p>
                    <p><a href="mailto:info@petrosoftinc.com" target="_blank">info@petrosoftinc.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
