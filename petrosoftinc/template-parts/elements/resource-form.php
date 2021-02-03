<script>
    jQuery(document).ready(function() {
        jQuery("form#schedule-a-demo").submit(function( event ) {
            event.preventDefault();
            jQuery(this).validate();

                var formFieldData = jQuery(this).serializeArray();
                console.log(formFieldData);
                jQuery.ajax({
                    type: 'POST',
                    url: 'https://analytics.clickdimensions.com/forms/h/aJRJhwSyIcUS0jSvHdg0o8',
                    data: jQuery(this).serialize(),
                    dataType: 'json',
                    success: function (result) {
                    },
                    error: function (result) {
                        petrosoftSendGtmEvent('download-whitepaper-submit');
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
#schedule-demo-block {height: auto!important;max-width: 100%!important;display: block!important;margin: auto!important;width: 100%!important;left: 0!important;right: 0!important;}
.schedule-demo-block .hidden {display: none!important;}
.schedule-demo-block form.hidden {display: none!important;}
.schedule-demo-block .img_wrapper{margin-top:20px;}
.schedule-demo-block .img_block{width: 208px;margin: 0 auto 20px auto;display: inline-block;vertical-align: top;color: #000;margin-top: 10px;}
.schedule-demo-block .img_block img {max-width: 65px!important;}
.schedule-demo-block p {margin-top: 20px;font-size: 18px;line-height: 22px;color: #000;width: 100%;}
.schedule-demo-block a {color: #000;textdecoration: none!important;}
#schedule-a-demo input[type=submit] {background: #3e74e7!important;}
#schedule-demo-block input[type=text], #schedule-a-demo input[type=tel], #schedule-a-demo input[type=email] {text-transform: capitalize!important;color: #000!important;font-size: 18px!important;line-height: 37px!important;height: 52px!important;}

</style>
<?php
  $value = get_field("download_form"); 
?>
<div class="container-fluid">
<div id="schedule-demo-block" class="schedule-demo-block">
    <div data-aos="fade-right" class="sd-content">
        <div class="left-container">
            <form id="schedule-a-demo" data-action="https://analytics.clickdimensions.com/forms/h/aJRJhwSyIcUS0jSvHdg0o8">            
				<input name="001" id="001" type="text" placeholder="First Name *" value="" required="">
                <input name="002" id="002" type="text" placeholder="Last Name *" value="" required="">
                <input name="501" id="501" type="tel" placeholder="Phone *" value="" required=""> 
                <input name="004" id="004" type="email" placeholder="E-mail *" value="" required="">
            	<input name="005" id="005" type="text" placeholder="Company *" value="" required="" style="width: 100%;" />
                <input name="source" id="source" type="hidden" value="campaign" />
                <input name="013" id="013" type="hidden" value="<?php print $value[0]['leadsource']; ?>" />
                <input name="015" id="015" type="hidden" value="<?php print $value[0]['file_url']; ?>" />
                <input type="submit" class="btn" value="submit" />
            </form>
            <div class="result hidden">
                <p><b>Thank you for requesting information</b> about Petrosoft solutions!</p>
                <p>A Petrosoft representative will be in contact with you shortly.</p>
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
    </div>
</div>
</div>