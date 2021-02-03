<a style="background-image: url(<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>); background-color: <?php print $template_data['element_fields']['background_color']; ?>" href="<?php print $template_data['element_fields']['link']; ?>" 
   class="wpb_content_element background-image-banner <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <div class="bi-title"><?php print $template_data['element_fields']['title']; ?></div>
    <?php if ($template_data['element_fields']['description'] != ''): ?>
      <div class="bi-description"><?php print $template_data['element_fields']['description']; ?></div>
    <?php endif; ?>
    <div class="bi-link <?php print $template_data['element_fields']['link_color']; ?>"><?php print $template_data['element_fields']['link_title']; ?><svg class="i-svg icon-arrow-4"><use xlink:href="#icon-arrow-4"></use></svg></div>
</a>