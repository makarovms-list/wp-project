<script>
	jQuery(document).ready(function() {
		jQuery('#watch-video-block #form-schedule-demo-popup select').selectric();
		jQuery("#button-watch-video-block").on('click', function(event) {
			jQuery("#watch-video-element-modal .m-video-wrapper").addClass("hidden");
			jQuery("#watch-video-element-modal .m-data-container").addClass("hidden");
			jQuery("#watch-video-element-modal #form-schedule-demo-popup").removeClass("hidden");
			event.preventDefault();
		});
		jQuery("#form-schedule-demo-popup").on('submit', function(event) {
			jQuery("#watch-video-element-modal #form-schedule-demo-popup").addClass("hidden");
			jQuery("#watch-video-element-modal .thankyou").removeClass("hidden");
			event.preventDefault();
		});
	});	
</script>
<style>
.watch-video-element-modal a {cursor: pointer;}
form.schedule-demo-popup input[type=text], form.schedule-demo-popup input[type=email],  form.schedule-demo-popup input[type=tel] {display: block;background: #FFFFFF;border: 1px solid #CAD3DE;box-sizing: border-box;border-radius: 6px;padding: 17px 10px;margin-bottom: 20px;width: 100%;font-size: 14px;color: #727e8e;font-family: Lato,sans-serif;display: inline-block;vertical-align: top;}
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
.thankyou {text-align: center;margin: 0 auto;}
.thankyou .img_wrapper .img_block {display: inline-block;vertical-align: top;margin: 0 32px;}
@media (max-width: 576px) {
    form.schedule-demo-popup input {max-width: 100%!important;margin-right: 0px!important;}
    form.schedule-demo-popup .selectric-petrosoft-select {width: 100%!important;margin-right: 0px!important;}
}
</style>
<div id="watch-video-block" class='watch-video-block'>
  <a data-aos="fade-right" href="#watch-video-element-modal" class="w-image-wrapper open-modal">
    <img alt="<?php print $template_data['fields']['watch_video']['image']['alt'];?>" class="w-image" src="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['watch_video']['image']['url'],'w' => 520,'h' => 341))?>" srcset="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['watch_video']['image']['url'],'w' => 1040,'h' => 683));?> 2x">
    <div class="w-play-icon-wrapper"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div>
  </a>  
  <div data-aos="fade-left" class="w-content">
    <h2 class="w-title"><?php print $template_data['fields']['watch_video']['title'];?></h2>
    <div class="w-description"><?php print $template_data['fields']['watch_video']['description'];?></div>
    <div class="w-btn-wrapper">
      <a class="open-modal btn <?php print $template_data['fields']['watch_video']['button_color'] ?>" href="#watch-video-element-modal"><?php print $template_data['fields']['watch_video']['button_label'];?></a>
    </div>
  </div>
  <div id="watch-video-element-modal" class="modal">
    <div class="video-modal-content">
      <div class="m-video-wrapper">
        <div class='video-embed-container'>
          <?php print $template_data['fields']['watch_video_popup']['video']; ?>
        </div>
        <a id="button-watch-video-block" class="btn"><?php print $template_data['fields']['watch_video_popup']['button_label'] ?></a>
      </div>
      <div class="m-data-container">
        <div class="m-title">
          <?php print $template_data['fields']['watch_video_popup']['title'] ?>
        </div>
        <div class="m-description">
          <?php print $template_data['fields']['watch_video_popup']['description'] ?>
        </div>
        <div class="m-person">
          <?php print $template_data['fields']['watch_video_popup']['person'] ?>
        </div>
      </div>
    </div>
    <form class="hidden schedule-demo-popup" id="form-schedule-demo-popup" data-action="https://analytics.clickdimensions.com/forms/h/an9VJeTDMUmqUWS9tVNHWA">
      <input name="001" id="001" type="text" placeholder="First Name *" value="" requrid="">
      <input name="002" id="002" type="text" placeholder="Last Name *" value="" requrid="">
      <input name="004" id="004" type="email" placeholder="E-mail *" value="" requrid="">
      <input name="501" id="501" type="tel" placeholder="Phone *" value="" requrid="">
      <input name="006" id="006" type="text" placeholder="Job Tile *" value="" requrid="">
      <input name="005" id="005" type="text" placeholder="Company *" value="" requrid="">
      <select class="petrosoft-select" name="011" id="011" requrid="">
        <option value="-1">Number of Location *</option>
        <option value="100000000">1</option>
        <option value="100000001">2 - 4</option>
        <option value="100000002">5 - 20</option>
        <option value="100000003">21 - 99</option>
        <option value="100000004">100+</option>
      </select>
      <select class="petrosoft-select" name="003" id="003" requrid="">
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
      <input name="012" id="012" type="hidden" placeholder="Product" value="<?php print $template_data['element_fields']['productid'] ?>" requrid="">
      <input name="013" id="013" type="hidden" placeholder="Leadsource" value="<?php print $template_data['element_fields']['leadsourceid'] ?>" requrid="">
      <span class="agree"><input class="petrosoft-checkbox" checked name="099" id="099" requrid="" type="checkbox" value="agree">  <label for="099">I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information*</label></span>
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
