<div id="our-trainers-block" class="our-trainers-block">
  <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['our_trainers']['title_color'] ?>"><?php print $template_data['fields']['our_trainers']['title'] ?></h2>
  <div class="trainers">
    <?php foreach ($template_data['fields']['our_trainers']['trainers'] as $trainer): ?>
      <div data-aos-duration="800" data-aos="flip-left" class="trainer">
        <img alt="<?php print $trainer['image']['alt'];?>" class="t-image" src="<?php print kama_thumb_src(array('src' =>  $trainer['image']['url'],'w' => 360,'h' => 360));?>" srcset="<?php print kama_thumb_src(array('src' =>  $trainer['image']['url'],'w' => 720,'h' => 720));?> 2x" />
        <div class="t-name"><?php print $trainer['name'];?></div>
        <div class="t-post"><?php print $trainer['post'];?></div>
        <div class="t-text"><?php print $trainer['text'];?></div>
      </div>  
    <?php endforeach; ?>
  </div>
</div>