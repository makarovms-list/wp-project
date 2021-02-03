 <?php 
    if ($template_data['fields']['main_page_banner']['video'] && count($template_data['fields']['main_page_banner']['video']) > 0){
      $banner_video = true;
    } else {
      $banner_video = false;
    }
  ?>
<div id="main-page-banner-block" class="main-page-banner-block <?php print $banner_video ? 'video-banner': ''?>" style="background-color: <?php print $template_data['fields']['main_page_banner']['background_color']; ?>; background-image: <?php print (isset($template_data['fields']['main_page_banner']['background_image']['url'])) ? 'url('.$template_data['fields']['main_page_banner']['background_image']['url'].')' : "none"; ?>">
  <?php if ($banner_video):?>
    <div class="video-wrapper">
      <video class="main-page-banner-video" autoplay muted loop id="main-page-banner-video">
        <source src="<?php print $template_data['fields']['main_page_banner']['video']['url']?>" type="video/mp4">
      </video>
    </div>
  <?php endif; ?>
  <div class="content-area">
    <div class="content-part">
      <h1 <?php print !$banner_video ? 'data-aos="fade-right"': ''?>  data-aos-duration="1000" style="color: <?php print $template_data['fields']['main_page_banner']['title_color'];?>"><?php print $template_data['fields']['main_page_banner']['banner_title'] ?></h1>
      <div <?php print !$banner_video ? 'data-aos="fade-up"': ''?>  data-aos-duration="1000" style="color: <?php print $template_data['fields']['main_page_banner']['text_color'];?>" class="mb-text"><?php print $template_data['fields']['main_page_banner']['banner_text'] ?></div>
      <?php if (isset($template_data['fields']['main_page_banner']['buttons']) && is_array($template_data['fields']['main_page_banner']['buttons'])):?>
        <div <?php print !$banner_video ? 'data-aos="fade-up"': ''?> data-aos-duration="1000" class="mb-btn-wrapper">
          <?php foreach ($template_data['fields']['main_page_banner']['buttons'] as $index => $button):?>
          <a class="btn main-page-banner-link <?php print $button['color'];?> <?php print (!isset($template_data['fields']['main_page_banner']['fix_button']) || $template_data['fields']['main_page_banner']['fix_button'] == true) ? "can-be-fixed" : "";?>" href="<?php print $button['link'];?>"><?php print $button['label'];?></a>
          <?php endforeach;?>
        </div>  
      <?php endif; ?>
    </div>
    <?php if($template_data['fields']['main_page_banner']['banner_image'] && count($template_data['fields']['main_page_banner']['banner_image']) > 0):?>
      <img alt="<?php print $template_data['fields']['main_page_banner']['banner_image']['alt'];?>" data-aos="fade-left" data-aos-duration="1000" src="<?php print $template_data['fields']['main_page_banner']['banner_image']['url']?>">
    <?php endif; ?>
  </div>
  <div <?php print !$banner_video ? 'data-aos="zoom-in"': ''?> class="mb-go-down-wrapper" ><svg class="i-svg icon-go-down mb-go-down"><use xlink:href="#icon-go-down"></use></svg></div>
</div>