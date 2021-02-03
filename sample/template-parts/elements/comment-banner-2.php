<?php $comment_banner_id = 'comment-banner-'.wp_rand(0,10000); ?>
<style>
  @media (max-width: 767px) {
    #<?php print $comment_banner_id ?> {
      background-color: <?php print $template_data['element_fields']['mobile_background_color'];?> !important;
    }
  }
</style>
<div style="background-color: <?php print $template_data['element_fields']['background_color'];?>" id="<?php print $comment_banner_id ?>" class="wpb_content_element comment-banner-2">
    <div class="cb-person">
      <?php if(isset($template_data['element_fields']['mobile_image'])):?>
        <picture>
          <source srcset="<?php print wp_get_attachment_image_src($template_data['element_fields']['mobile_image'],'original')[0] ?>" media="(max-width: 767px)">
          <img src="<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>" srcset="<?php print petrosoft_wpb_retina_image_src($template_data['element_fields']['image']);?> 2x">
        </picture>
      <?php else: ?>
        <img src="<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>" srcset="<?php print petrosoft_wpb_retina_image_src($template_data['element_fields']['image']);?> 2x">
      <?php endif; ?>
    </div>
    <div class="cb-content"><?php print $template_data['element_fields']['content']; ?></div>
</div>