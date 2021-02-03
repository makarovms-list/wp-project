<div id="our-values-block" class="our-values-block">
  <h2 data-aos="fade-up" class="line-title"><?php print $template_data['fields']['our_values']['title'] ?></h2>
  <div class="our-values">
    <?php foreach($template_data['fields']['our_values']['values'] as $index => $value):?>
      <div class="value-block">
        <div class="v-image" data-aos="<?php print ($index % 2) ? "fade-left" : "fade-right"; ?>">
          <picture>
            <source srcset="<?php print kama_thumb_src(array('src' =>  $value['image']['url'],'w' => 1119,'h' => 773));?>" media="(min-width: 481px) and (max-width: 1199px)">
            <source srcset="<?php print kama_thumb_src(array('src' =>  $value['image']['url'],'w' => 400,'h' => 276));?>" media="(max-width: 480px)">
            <img alt="<?php print $value['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $value['image']['url'],'w' => 560,'h' => 373));?>" srcset="<?php print kama_thumb_src(array('src' =>  $value['image']['url'],'w' => 1120,'h' => 746));?> 2x">
          </picture>
        </div>
        <div data-aos="<?php print ($index % 2) ? "fade-right" : "fade-left"; ?>"class="v-content">
          <div class="v-index"><?php print $value['index']?></div>
          <div class="v-title"><?php print $value['title']?></div>
          <div class="v-description"><?php print $value['description']?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
