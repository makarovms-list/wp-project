<div id="pages-catalog-block" class="pages-catalog-block">
  <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['pages_catalog']['title_color']?>"><?php print $template_data['fields']['pages_catalog']['title']?></h2>
  <div data-aos="fade-left" class="pc-main-description"><?php print $template_data['fields']['pages_catalog']['description']?></div>
  <div class="pages-list">
    <?php foreach($template_data['fields']['pages_catalog']['list'] as $index => $page): ?>
      <div data-aos="flip-left" class="c-page">
        <div class="c-page-content">
          <a class="p-image <?php print (isset($page['link']) && $page['link'] != '')  ? '' : 'nolink' ?>" href="<?php print $page['link']?>">
            <img alt="<?php print $page['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $page['image']['url'],'w' => 270,'h' => 270));?>" srcset="<?php print kama_thumb_src(array('src' =>  $page['image']['url'],'w' => 540,'h' => 540));?> 2x">
          </a>
          <a href="<?php print $page['link']?>" class="p-title <?php print (isset($page['link']) && $page['link'] != '') ? '' : 'nolink' ?>"><h3><?php print $page['title']?></h3></a>
          <div class="p-description"><?php print $page['description']?></div>
        </div>
        <?php if(isset($page['link']) && $page['link'] != ''):?>
          <a class="btn" href="<?php print $page['link']?>">Learn more</a>
        <?php endif; ?>  
      </div> 
    <?php endforeach; ?>
  </div>
</div>

