<a href="<?php print $template_data['element_fields']['link']; ?>" class="download-now-block">
  <img class="dn-icon" src="<?php print kama_thumb_src(array('src' => wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0],'w' => 220,'h' => 220));?> 2x"/>
  <div class="dn-data">
    <div class="dn-title"><?php print $template_data['element_fields']['title']; ?></div>
    <div class="dn-description"><?php print $template_data['element_fields']['description']; ?></div>
    <div class="dn-link">Download Now >></div>
  </div>
</a>