<div id="configure-solution-block" class='configure-solution-block'>
  <img alt="<?php print $template_data['fields']['configure_solution']['image']['alt'];?>" data-aos="fade-right" class="cs-image" src='<?php print $template_data['fields']['configure_solution']['image']['url'];?>'>
  <div data-aos="fade-left" class="cs-content">
    <h2 class="cs-title"><?php print $template_data['fields']['configure_solution']['title'];?></h2>
    <div class="cs-description"><?php print $template_data['fields']['configure_solution']['description'];?></div>
    <?php if(is_array($template_data['fields']['configure_solution']['buttons'])):?>
      <div class="btn-wrapper">
        <?php foreach ($template_data['fields']['configure_solution']['buttons'] as $button):?>
          <a class="btn <?php print $button['color'] ?>" href="<?php print $button['link'];?>"><?php print $button['label'];?></a>
        <?php endforeach; ?>  
      </div>
    <?php endif;?>
  </div>
</div>
