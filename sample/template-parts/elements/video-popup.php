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
  <?php if (isset($template_data['element_fields']['video_iframe']) && $template_data['element_fields']['video_iframe'] != ''):?>
    <div class="video-embed-container">
      <?php print rawurldecode(base64_decode($template_data['element_fields']['video_iframe'])); ?>
    </div>
  <?php endif; ?>
  <?php if (isset($template_data['element_fields']['video']) && $template_data['element_fields']['video'] != ''):?>
    <video style="width: 100%" controls>
      <source src="<?php print $template_data['element_fields']['video']; ?>" type="video/mp4">
      Your browser doesn't support HTML5 video tag.
    </video>
  <?php endif ?>
</div>
