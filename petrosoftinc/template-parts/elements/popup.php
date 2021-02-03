<?php if(isset($template_data['element_fields']['time']) && is_numeric($template_data['element_fields']['time'])):?>
  <script>
    jQuery(document).ready(function() {
      setTimeout(function(){
        if (jQuery.cookie('popup-<?php print $template_data['element_fields']['id'] ?>') != 'hide') {
          jQuery('#<?php print $template_data['element_fields']['id']?>').addClass('open');
          var expires = new Date();
          expires.setTime(expires.getTime() + (6*60*60*1000)); 
          jQuery.cookie('popup-<?php print $template_data['element_fields']['id'] ?>', 'hide', {expires: expires});
        }
      },<?php print $template_data['element_fields']['time']?>000);
    });  
  </script>
<?php endif; ?>
  <div
    <?php if(isset($template_data['element_fields']['background_image'])):?>
      style="background: url('<?php print wp_get_attachment_image_src($template_data['element_fields']['background_image'], 'original')[0]; ?>'); background-size: cover"
    <?php else: ?>
      style="background-color: <?php print $template_data['element_fields']['background_color']?>"
    <?php endif; ?>
    id="<?php print $template_data['element_fields']['id'] ?>" class="petrosoft-popup-block">
    <div style="background-color: <?php print $template_data['element_fields']['close_color']?>" class="p-close"><svg class="i-svg icon-close"><use xlink:href="#icon-close"></use></svg></div>
    <div class="p-content">
      <?php if (isset($template_data['element_fields']['image'])): ?>
        <img alt="<?php print get_post_meta($template_data['element_fields']['image'], '_wp_attachment_image_alt', true);?>" class="p-icon" src="<?php print wp_get_attachment_image_src($template_data['element_fields']['image'], 'original')[0]; ?>"
          <?php if (isset($template_data['element_fields']['retina_image'])): ?>
             srcset="<?php print wp_get_attachment_image_src($template_data['element_fields']['retina_image'],'original')[0]; ?> 2x"
          <?php endif; ?>
        >
      <?php endif; ?>
      <?php if (isset($template_data['element_fields']['title'])): ?>
        <div style='color: <?php print $template_data['element_fields']['title_color']; ?>' class="p-title"><?php print $template_data['element_fields']['title'];?></div>
      <?php endif; ?>
      <a href="<?php print $template_data['element_fields']['link'];?>" class="btn <?php print $template_data['element_fields']['button_color'];?>"><?php print $template_data['element_fields']['button_label'] ?></a>
    </div>  
  </div>
