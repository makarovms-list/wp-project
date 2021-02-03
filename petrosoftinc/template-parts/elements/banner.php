<div id="banner-block" class="banner-block" style="background-color: <?php print $template_data['fields']['banner']['background_color'] ?>; background-image: url(<?php print $template_data['fields']['banner']['background_image']['url']?>)">
  <div class="content-area">
    <div class="b-data-block">
      <div data-aos="fade-down"  class="b-title-wrapper">
        <h2 class="b-title" style="color: <?php print $template_data['fields']['banner']['title_color'] ?> "><?php print $template_data['fields']['banner']['title'] ?></h2>
        <div class="b-title-underline" style="background-color:<?php print $template_data['fields']['banner']['title_underline_color'] ?>"></div>
      </div>
      <div data-aos="fade-up" class="b-text" style="color: <?php print $template_data['fields']['banner']['text_color'] ?>"><?php print $template_data['fields']['banner']['text'] ?></div>
      <?php if(isset($template_data['fields']['banner']['button_link']) && $template_data['fields']['banner']['button_link'] != ''):?>
        <div data-aos="fade-up" class="b-button-wrapper">
          <a class="btn <?php print $template_data['fields']['banner']['button_color']?>" href="<?php print $template_data['fields']['banner']['button_link'] ?>"><?php print $template_data['fields']['banner']['button_label'];?></a>
        </div>  
      <?php endif; ?>
    </div>
  </div>
</div>