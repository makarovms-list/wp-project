<div id="presenting-the-new-block" style="background-color: <?php print $template_data['fields']['presenting_the_new']['background_color']?>" class="presenting-the-new-block">
  <div data-aos="fade-down" class="n-label" style="color: <?php print $template_data['fields']['presenting_the_new']['label_color']?>"><?php print $template_data['fields']['presenting_the_new']['label'];?></div>
  <h2 data-aos="fade-right" class="n-title" style="color: <?php print $template_data['fields']['presenting_the_new']['text_color']?>"><?php print $template_data['fields']['presenting_the_new']['title']?></h2>
  <div data-aos="fade-left" class="n-description" style="color: <?php print $template_data['fields']['presenting_the_new']['text_color']?>"><?php print $template_data['fields']['presenting_the_new']['description']?></div>
  <?php if(isset($template_data['fields']['presenting_the_new']['button_link']) && $template_data['fields']['presenting_the_new']['button_link'] != ''):?>
    <div data-aos="fade-right">
      <a class="btn <?php print $template_data['fields']['presenting_the_new']['button_color']; ?>" href="<?php print $template_data['fields']['presenting_the_new']['button_link']?>">
        <?php print $template_data['fields']['presenting_the_new']['button_label'];?>
      </a>  
    </div>
  <?php endif ?>
  <picture data-aos="fade-up">
    <source srcset="<?php print $template_data['fields']['presenting_the_new']['mobile_image']['url'];?>" media="(max-width: 567px)">
    <img alt="<?php print $template_data['fields']['presenting_the_new']['image']['alt'];?>" class="n-image" src="<?php print $template_data['fields']['presenting_the_new']['image']['url'];?>" 
      <?php if (isset($template_data['fields']['presenting_the_new']['retina_image']['url'])):?>  
        srcset="<?php print $template_data['fields']['presenting_the_new']['retina_image']['url'];?> 2x"
      <?php endif;?>        
    >
  </picture>
</div>
