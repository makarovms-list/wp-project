<div id="product-features-block" class="product-features-block">
  <div class="content-area">
    <div class="pf-header">
      <h2 data-aos="fade-down" class="line-title <?php print $template_data['fields']['product_features']['title_color']?>"><?php print $template_data['fields']['product_features']['title']?></h2>
      <div data-aos="fade-left" class="pf-description"><?php print $template_data['fields']['product_features']['description']?></div>
    </div>
    <style>
      <?php foreach($template_data['fields']['product_features']['features'] as $index => $feature): ?>
        .p-features-list .feature-wrapper .feature-<?php print $index ?>:hover {
          box-shadow: 0 4px 30px <?php print hex2rgba($feature['hover_color'],0.36);?>
        }
      <?php endforeach; ?>
    </style>
    <div class="p-features-list">  
      <?php foreach($template_data['fields']['product_features']['features'] as $index => $feature): ?>
      <div class="feature-wrapper" data-aos="flip-left" >
        <div class="feature feature-<?php print $index ?>">
          <img alt="<?php print $feature['icon']['alt'];?>" class="f-icon" src="<?php print kama_thumb_src(array('src' =>  $feature['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $feature['icon']['url'],'w' => 220,'h' => 220));?> 2x">
          <div class="f-title"><?php print do_shortcode($feature['title']);?></div>
          <div class="f-description"><?php print $feature['description'];?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
