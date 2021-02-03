<a style="background-image: url(<?php print $template_data['image']['url'] ?>); background-color: <?php print $template_data['background_color']; ?>" href="<?php print $template_data['link']; ?>" 
   class="wpb_content_element side-blocks-side-call-out-type-1">
    <h3 class="sc-title"><?php print $template_data['title']; ?></h3>
    <?php if (isset($template_data['description']) && $template_data['description'] != ''): ?>
      <div class="sc-description"><?php print $template_data['description']; ?></div>
    <?php endif; ?>
    <div class="sc-link <?php print $template_data['link_color']; ?>"><?php print $template_data['link_title']; ?><svg class="i-svg icon-arrow-4"><use xlink:href="#icon-arrow-4"></use></svg></div>
</a>