<div class="wpb_content_element features-links-element <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <h2><?php print $template_data['element_fields']['title'] ?></h2>
    <div class="f-main-description"><?php print $template_data['element_fields']['description'] ?></div>
    <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row features-list">
      <?php foreach ($template_data['element_fields']['features'] as $feature): ?>
        <div class="feature-wrapper wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
          <div class="vc_column-inner">
            <div class="wpb_wrapper feature">
              <a href="<?php print $feature['link'] ?? '#' ?>">
                <img class="f-icon" src="<?php print kama_thumb_src(array('src' => wp_get_attachment_image_src($feature['icon'],'original')[0],'w' => 64,'h' => 64))?>" srcset="<?php print kama_thumb_src(array('src' =>  wp_get_attachment_image_src($feature['icon'],'original')[0],'w' => 128,'h' => 128));?> 2x"/>
                <div class="f-content">
                  <div class="f-title"><?php print $feature['title'] ?? '' ?></div>
                  <div class="f-description"><?php print $feature['description'] ?? '' ?></div>
                </div>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div> 
</div>