<div class="wpb_content_element resource-block-vertical-element <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <div class="r-image">
      <a class="r-image-link" href="<?php print $template_data['element_fields']['link'] ?? ''; ?>">
         <img src="<?php print kama_thumb_src(array('src' => wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0],'w' => 296,'h' => 180))?>" srcset="<?php print kama_thumb_src(array('src' =>  wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0],'w' => 592,'h' => 360));?> 2x"/>
      </a>
    </div>
    <div class="r-content">
      <div class="r-fields">
        <?php if(isset($template_data['element_fields']['category']) && $template_data['element_fields']['category'] != ''): ?>
          <a href="<?php print (isset($template_data['element_fields']['category_link']) && $template_data['element_fields']['category_link'] != '') ? $template_data['element_fields']['category_link'] : $template_data['element_fields']['link'] ?? '' ?>" class="r-category"><?php print $template_data['element_fields']['category']; ?></a>
        <?php endif; ?>  
        <a href="<?php print $template_data['element_fields']['link'] ?? '' ?>" class='r-title'><?php print $template_data['element_fields']['title'] ?? ''; ?></a>
        <a href="<?php print $template_data['element_fields']['link'] ?? '' ?>" class='r-text'><?php print $template_data['element_fields']['content'] ?? ''; ?></a>
      </div>  
      <a class="r-more-link" href="<?php print $template_data['element_fields']['link'] ?? '' ?>"><span><?php print $template_data['element_fields']['link_text'] ?? 'READ MORE'; ?></span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
    </div>
</div>