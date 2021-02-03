<div id="who-we-are-block" class="who-we-are-block">
  <h2 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" class="line-title <?php print $template_data['fields']['who_we_are']['title_color'] ?>"><?php print $template_data['fields']['who_we_are']['title'];?></h2>
  <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" class="w-main-description"><?php print $template_data['fields']['who_we_are']['description']; ?></div>
  <div class="achievements-list">  
    <?php foreach($template_data['fields']['who_we_are']['achievements'] as $index => $achievement): ?>
      <?php if($achievement['type'] == 'single'):?>
      <div class="achievement-wrapper">
        <div data-aos="zoom-in" class="achievement single">
          <img alt="<?php print $achievement['icon']['alt'];?>" class="a-icon" src="<?php print kama_thumb_src(array('src' =>  $achievement['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $achievement['icon']['url'],'w' => 220,'h' => 220));?> 2x">
          <div class="a-title"><?php print do_shortcode($achievement['title']);?></div>
          <div class="a-description"><?php print $achievement['description'];?></div>
        </div>
      </div>
      <?php endif;?>
      <?php if($achievement['type'] == 'double'):?>
        <div class="achievement-wrapper">
          <div class="double-achievement-wrapper">
            <?php foreach ($achievement['double_achievements'] as $d_achievement):?>
              <div data-aos="zoom-in" class="achievement double">
                <img alt="<?php print $d_achievement['icon']['alt'];?>" class="a-icon" src="<?php print kama_thumb_src(array('src' =>  $d_achievement['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $d_achievement['icon']['url'],'w' => 220,'h' => 220));?> 2x">
                <div class="a-title"><?php print do_shortcode($d_achievement['title']);?></div>
                <div class="a-description"><?php print $d_achievement['description'];?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif;?>
    <?php endforeach; ?>
  </div>
</div>
