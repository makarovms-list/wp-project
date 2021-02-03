<div class="wpb_content_element review-element <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <div class="r-content"><?php print $template_data['element_fields']['review']; ?></div>
    <div class="r-person">
      <img src="<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>" srcset="<?php print petrosoft_wpb_retina_image_src($template_data['element_fields']['image']);?> 2x">
      <div class="r-info">
        <div class="r-name"><?php print $template_data['element_fields']['name']; ?></div>
        <div class="r-post"><?php print $template_data['element_fields']['post']; ?></div>
      </div>
    </div>
</div>