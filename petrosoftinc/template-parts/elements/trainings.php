<div id="trainings-block" class="trainings-block">
  <?php foreach ($template_data['fields']['trainings'] as $index => $training_block): ?>
  <div id="training-block-<?php print $index+1 ?>" class="training-block training-block-<?php print $index+1 ?>">
    <div data-aos="fade-up" class="t-title-row">
      <h2 class="line-title <?php print $training_block['title_color']; ?>"><?php print $training_block['title']; ?></h2>
      <a target="_blank" href="<?php print $template_data['schedule_link']; ?>" class="t-more-link"><span>More Trainings</span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
    </div>
    <div data-aos="fade-left" class="t-block-description"><?php print $training_block['description'];?></div>
    <div class="trainings">
      <?php foreach ($training_block['trainings_list'] as $training):?>
      <div data-aos-duration="800" data-aos="flip-left" class="training">
        <div class="training-content">
          <img alt="<?php print $training['image']['alt'];?>" class="t-image" src="<?php print kama_thumb_src(array('src' =>  $training['image']['url'],'w' => 270,'h' => 270));?>" srcset="<?php print kama_thumb_src(array('src' =>  $training['image']['url'],'w' => 540,'h' => 540));?> 2x" />
          <div class="t-title"><?php print $training['title']?></div>
          <div class="t-description"><?php print $training['description']?></div>
        </div>
        <a target="_blank" href="<?php print $template_data['schedule_link']; ?>" class="t-link"><span><?php print $training['link_label']; ?></span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="t-more-link-mobile-wrapper">
      <a target="_blank" href="<?php print $template_data['schedule_link']; ?>" class="t-more-link-mobile"><span>More Trainings</span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
    </div>
  </div>
  <?php endforeach; ?>
</div>