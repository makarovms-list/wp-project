<div id="achievements" class="achievements">
  <div class="content-area">
    <div data-aos="fade-up" class="line-title double <?php print $template_data['fields']['achievements_title']['color_scheme'] ?>">
      <h2 class="l-title"><?php print $template_data['fields']['achievements_title']['title'];?></h2>
      <div data-aos="fade-left" class="l-subtitle"><?php print $template_data['fields']['achievements_title']['description'];?></div>
   </div>
    <div class="achievements-list achievements-count-<?php print $template_data['fields']['achievements_title']['achievements_count']; ?>">  
      <?php foreach($template_data['fields']['achievements'] as $index => $achievement): ?>
      <div class="achievement-wrapper" data-aos="flip-left" >
        <div class="achievement achievement-<?php print $index ?>">
          <img alt="<?php print $achievement['icon']['alt']; ?>" class="a-icon" src="<?php print kama_thumb_src(array('src' =>  $achievement['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $achievement['icon']['url'],'w' => 220,'h' => 220));?> 2x">
          <div class="a-title" style="color: <?php print $achievement['color']?>"><?php print do_shortcode($achievement['title']);?></div>
          <div class="a-description"><?php print $achievement['description'];?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
