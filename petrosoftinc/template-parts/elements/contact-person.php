<div id="contact-person-block" class="contact-person-block" style="background-color: <?php print $template_data['fields']['contact_person']['background_color'] ?>;">
  <div class="content-area">
    <div data-aos="fade-right" class="c-p-data" style="color: <?php print $template_data['fields']['contact_person']['text_color']?>">
      <div class="c-p-message"><?php print $template_data['fields']['contact_person']['message']?></div>
      <div class="c-p-name"><?php print $template_data['fields']['contact_person']['name'];?></div>
      <div class="c-p-post"><?php print $template_data['fields']['contact_person']['post'];?></div>
      <?php if (isset($template_data['fields']['contact_person']['mail']) && $template_data['fields']['contact_person']['mail'] != ''):?>
        <a class="c-p-mail" style="color: <?php print $template_data['fields']['contact_person']['text_color']?>" href="mailto:<?php print $template_data['fields']['contact_person']['mail'];?>"><svg class="i-svg icon-mail"><use xlink:href="#icon-mail"></use></svg> Contact via Email <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
      <?php endif; ?>
    </div>
    <div data-aos="fade-left" class="c-p-image">
      <img alt="<?php print $template_data['fields']['contact_person']['image']['alt'];?>" src="<?php print $template_data['fields']['contact_person']['image']['url'] ?>">
      <?php if($template_data['fields']['contact_person']['show_quotes']): ?>
        <div class="c-p-quotes <?php print $template_data['fields']['contact_person']['quotes_side']?>"></div>
      <?php endif; ?>
    </div>
  </div>
</div>