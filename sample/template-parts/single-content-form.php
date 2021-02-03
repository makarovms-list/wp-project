<?php 
  $form_fields = get_field('content_form_fields');
  if (!isset($form_fields['form_type']) || !is_string($form_fields['form_type']) || $form_fields['form_type'] == '') {
    $form_fields['form_type'] = 'content-form';
  }
?>
<div class="content-form">
  <?php if(isset($form_fields['title']) && $form_fields['title'] != ''):?>
    <h2><?php print $form_fields['title']; ?></h2>
  <?php endif; ?>
  <?php if (isset($form_fields['description']) && $form_fields['description'] != ''):?>
    <div class="c-f-subtitle"><?php print $form_fields['description'] ?></div>
  <?php endif; ?>
  <div class="form-<?php print $form_fields['form_type'] ?>">  
    <?php print do_shortcode('[cf7form cf7key="'.$form_fields['form_type'].'"]');?>
  </div>  
</div>
