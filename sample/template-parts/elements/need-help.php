<div id="need-help-block" class="need-help-block">
  <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['need_help']['title_color'] ?>"><?php print $template_data['fields']['need_help']['title']?></h2>
  <div class="help-blocks">
    <?php foreach ($template_data['fields']['need_help']['help_blocks'] as $help_block):?>
      <div data-aos="zoom-in-up" class="help-block" style="background-color: <?php print $help_block['background_color']?>">
        <img alt="<?php print $help_block['icon']['alt'];?>" class="h-icon" src="<?php print kama_thumb_src(array('src' =>  $help_block['icon']['url'],'w' => 80,'h' => 80))?>" srcset="<?php print kama_thumb_src(array('src' =>  $help_block['icon']['url'],'w' => 160,'h' => 160));?> 2x">
        <div class="h-title"><?php print $help_block['title']?></div>
        <div class="h-text"><?php print $help_block['text']?></div>
      </div>
    <?php endforeach;?>
  </div>
</div>
