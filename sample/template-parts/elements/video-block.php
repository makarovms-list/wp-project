<a  href="#<?php print $template_data['element_fields']['id']; ?>" class="wpb_content_element video-block open-modal">
    <div class="vb-image-wrapper">
      <div class="vb-image-play">
        <div class="vb-overlay"></div>
        <svg class="i-svg icon-video-play"><use xlink:href="#icon-video-play"></use></svg>
      </div>  
      <img src="<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>" srcset="<?php print petrosoft_wpb_retina_image_src($template_data['element_fields']['image']);?> 2x" >
    </div>
    <?php if (isset($template_data['element_fields']['title']) && $template_data['element_fields']['title'] != ''): ?>
      <div class="vb-watch-text">WATCH VIDEO:</div>
      <div class="vb-title"><?php print $template_data['element_fields']['title']; ?></div>
    <?php endif; ?>
</a>

<div id="<?php print $template_data['element_fields']['id']?>" class="modal">
    <video style="width: 100%" controls>
      <source src="<?php print $template_data['element_fields']['video']; ?>" type="video/mp4">
      Your browser doesn't support HTML5 video tag.
    </video>
</div>