<a style="background-image: url(<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>); background-color: <?php print $template_data['element_fields']['background_color']; ?>" href="<?php print $template_data['element_fields']['link']; ?>" 
   class="wpb_content_element side-callout-type-1 <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <h3 class="sc-title"><?php print $template_data['element_fields']['title']; ?></h3>
    <?php if (isset($template_data['element_fields']['description']) && $template_data['element_fields']['description'] != ''): ?>
      <div class="sc-description"><?php print $template_data['element_fields']['description']; ?></div>
    <?php endif; ?>
    <div class="sc-link <?php print $template_data['element_fields']['link_color']; ?>"><?php print $template_data['element_fields']['link_title']; ?><svg class="i-svg icon-arrow-4"><use xlink:href="#icon-arrow-4"></use></svg></div>
</a>