<div id="history-block" class="history-block">
  <h2 data-aos="fade-up" class="line-title"><?php print $template_data['fields']['history']['title'] ?></h2>
  <div data-aos="fade-up" class="h-description"><?php print $template_data['fields']['history']['description'] ?></div>
  <div class="history">
    <?php foreach($template_data['fields']['history']['history_moments'] as $index => $history_element):?>
      <div class="history-moment" data-aos="fade-right" data-aos-delay="<?php print (($index+1) * 100) ?>">
        <div class="h-block <?php print ($index == 0) ? 'opened':''?>">
          <img alt="<?php print $history_element['icon']['alt'];?>" class="h-b-icon" src="<?php print kama_thumb_src(array('src' => $history_element['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $history_element['icon']['url'],'w' => 220,'h' => 220));?> 2x">
          <div class="h-b-date"><?php print  $history_element['date']; ?></div>
          <div class="h-b-text">
            <?php print  $history_element['text']; ?>
          </div>
          <div class="triangle-wrapper"><div class="triangle"></div></div>
        </div>
        <img alt="<?php print $history_element['icon']['alt'];?>" class="h-icon" src="<?php print kama_thumb_src(array('src' => $history_element['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $history_element['icon']['url'],'w' => 220,'h' => 220));?> 2x">
        <div class="h-date"><?php print $history_element['date']?></div>
      </div>  
    <?php endforeach; ?>
    <div data-aos="fade-up" class="history-line"></div>
  </div>
</div>
