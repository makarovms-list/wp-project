<div id="hear-from-our-employees-block" class="hear-from-our-employees-block">
  <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['hear_from_our_employees']['title_color'] ?>"><?php print $template_data['fields']['hear_from_our_employees']['title'] ?></h2>
  <div class="e-reviews">
    <?php foreach($template_data['fields']['hear_from_our_employees']['reviews'] as $index => $review):?>
      <div data-aos="zoom-in" class="e-review">
        <div class="er-text" style="color: <?php print $review['text_color']?>"><?php print $review['text']?></div>
        <div class="er-person">
          <div class="er-image">
            <img alt="<?php print $review['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $review['image']['url'],'w' => 80,'h' => 80));?>" srcset="<?php print kama_thumb_src(array('src' =>  $review['image']['url'],'w' => 160,'h' => 160));?> 2x">
          </div>
          <div class="er-data">
            <div class="er-name"><?php print $review['name']?></div>
            <div class="er-post"><?php print $review['post']?></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
