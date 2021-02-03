<div id="services-plate-block" class="services-plate-block">
  <div class="content-area">
    <div class="sp-header">
        <h2 data-aos="fade-down" class="line-title <?php print $template_data['fields']['services_plate']['title_color']?>"><?php print $template_data['fields']['services_plate']['title']?></h2>
        <div data-aos="fade-left" class="sp-description"><?php print $template_data['fields']['services_plate']['description']?></div>
    </div>
    <div class="sp-services">
      <?php foreach($template_data['fields']['services_plate']['services'] as $index => $service): ?>
      <a data-aos="fade-left" href="<?php print (isset($service['link']) && $service['link'] !== '') ? $service['link']:"";?>" class="sp-service <?php print (!isset($service['link']) || $service['link'] == '') ? 'nolink' : '';?>">
        <img alt="<?php print $service['icon']['alt'];?>" class="sp-icon" src="<?php print kama_thumb_src(array('src' =>  $service['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $service['icon']['url'],'w' => 220,'h' => 220));?> 2x">
        <div class="sp-service-title"><?php print $service['title'];?></div>
        <div class="sp-service-description"><?php print $service['description'];?></div>
        <?php if(isset($service['link']) && $service['link'] !== ''): ?>
          <div class="sp-more-link" ><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></div>
        <?php endif; ?>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>