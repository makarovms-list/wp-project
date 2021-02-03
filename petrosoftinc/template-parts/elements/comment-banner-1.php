<div class="wpb_content_element comment-banner-1">
    <div class="cb-content"><?php print $template_data['element_fields']['content']; ?></div>
    <div class="cb-person">
      <img src="<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>" srcset="<?php print petrosoft_wpb_retina_image_src($template_data['element_fields']['image']);?> 2x">
      <?php if($template_data['element_fields']['name'] != ''): ?>
        <div class="cb-name"><?php print $template_data['element_fields']['name']; ?></div>
      <?php endif; ?>
    </div>
</div>