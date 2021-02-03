<div id="our-team-block" class="our-team-block">
  <h2 data-aos="fade-up" class="line-title"><?php print $template_data['fields']['our_team']['title'] ?></h2>
  <div class="our-team">
    <?php foreach($template_data['fields']['our_team']['team'] as $index => $person):?>
      <div data-aos="zoom-in" class="person">
        <div class="p-image">
          <img alt="<?php print $person['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $person['image']['url'],'w' => 165,'h' => 165));?>" srcset="<?php print kama_thumb_src(array('src' =>  $person['image']['url'],'w' => 330,'h' => 330));?> 2x">
        </div>
        <div class="p-content">
          <div class="p-name"><?php print $person['name']?></div>
          <div class="p-post"><?php print $person['post']?></div>
          <div class="p-description"><?php print $person['description']?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
