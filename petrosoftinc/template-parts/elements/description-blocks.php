<div id="description-blocks" class="description-blocks">
  <?php foreach($template_data['fields']['description_blocks'] as $index => $block):?>
    <div class="description-block">
      <div class="d-mobile-title line-title <?php print $block['title_color']?>"><?php print $block['title']?></div>
      <div class="d-image" data-aos="<?php print ($index % 2) ? "fade-right" : "fade-left"; ?>">
        <img alt="<?php print $block['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $block['image']['url'],'w' => 560,'h' => 360));?>" srcset="<?php print kama_thumb_src(array('src' =>  $block['image']['url'],'w' => 1120,'h' => 720));?> 2x">
      </div>
      <div data-aos="<?php print ($index % 2) ? "fade-left" : "fade-right"; ?>"class="d-content">
        <h2 class="d-title line-title <?php print $block['title_color']?>"><?php print $block['title']?></h2>
        <div class="d-description"><?php print $block['description']?></div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
