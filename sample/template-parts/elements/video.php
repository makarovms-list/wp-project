<div class="wpb_content_element video-element <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <div class="v-video-wrapper">
      <video width="100%" height="auto" controls="controls">
        <source src="<?php print $template_data['element_fields']['video']; ?>" type='video/mp4'>
      </video>
      <div style="background-image: url('<?php print petrosoft_wpb_retina_image_src($template_data['element_fields']['image']);?>')" class="v-video-overlay">
        <div class="v-overlay-color"></div>
        <div class="v-video-play"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div>
      </div>
    </div>
    <div class="v-content">
      <div class="v-type"><?php print $template_data['element_fields']['type']; ?></div>
      <div class="v-title"><?php print $template_data['element_fields']['title']; ?></div>
      <div class="v-description"><?php print $template_data['element_fields']['description'];?></div>
    </div>
</div>