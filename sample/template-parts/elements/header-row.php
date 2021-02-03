<div id="header-row-block" class="header-row-block">
  <div data-aos="fade-right" class="hr-logo-container">
    <img alt="<?php print $template_data['fields']['header_row']['icon']['alt'];?>" class="hr-logo" src="<?php print $template_data['fields']['header_row']['icon']['url']?>"/>
    <h1><?php print $template_data['fields']['header_row']['title'] ?></h1>
  </div>
  <div data-aos="fade-left" class="hr-links">
    <?php foreach ($template_data['fields']['header_row']['links'] as $link):?>
      <a class="<?php print $link['class'] ?>" href="<?php print $link['link'] ?>"><img alt="<?php print $link['icon']['alt'];?>" class="hr-link-icon" src="<?php print $link['icon']['url']?>"/><span style="color: <?php print $link['color'];?>"><?php print $link['label'];?></span></a>
    <?php endforeach; ?>
  </div>
</div>