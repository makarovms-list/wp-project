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
  <div class="video-modal-content">
    <div class="m-video-wrapper">
      <div class='video-embed-container'>
        <?php if(isset($template_data['element_fields']['video_iframe'])): ?>
          <?php print rawurldecode(base64_decode($template_data['element_fields']['video_iframe'])); ?>
        <?php endif; ?>
        <?php if (isset($template_data['element_fields']['video']) && $template_data['element_fields']['video'] != ''):?>
          <video style="width: 100%" controls>
            <source src="<?php print $template_data['element_fields']['video']; ?>" type="video/mp4">
            Your browser doesn't support HTML5 video tag.
          </video>
        <?php endif ?>
      </div>
      <?php if (isset($template_data['element_fields']['link']) && isset($template_data['element_fields']['button_label'])): ?>
        <a href="<?php print $template_data['element_fields']['link'] ?>" class="btn"><?php print $template_data['element_fields']['button_label'] ?></a>
      <?php endif; ?>
    </div>
    <div class="m-data-container">
      <?php if(isset($template_data['element_fields']['title'])): ?>
        <div class="m-title">
          <?php print $template_data['element_fields']['title'] ?>
        </div>
      <?php endif; ?>
      <?php if(isset($template_data['element_fields']['description'])): ?>
        <div class="m-description">
          <?php print $template_data['element_fields']['description'] ?>
        </div>
      <?php endif; ?>
      <?php if(isset($template_data['element_fields']['person'])): ?>
        <div class="m-person">
          <?php print $template_data['element_fields']['person'] ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
