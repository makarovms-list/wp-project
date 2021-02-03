<?php if(isset($template_data['element_fields']['time']) && is_numeric($template_data['element_fields']['time'])):?>
  <script>
    setTimeout(function(){
      $('#<?php print $template_data['element_fields']['id']?>').modal({
        fadeDuration: 250
      });
    },<?php print $template_data['element_fields']['time']?>000);
  </script>
<?php endif; ?>
<div id="<?php print $template_data['element_fields']['id']?>" class="modal">
 <?php print do_shortcode( $template_data['element_fields']['content']);?>
</div>
