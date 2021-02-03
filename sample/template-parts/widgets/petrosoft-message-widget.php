
<div data-show-delay="<?php print $widget_data['fields']['show_delay']; ?>" data-message-id="<?php print $widget_data['fields']['title']; ?>" class="petrosoft-message-widget <?php print $widget_data['args']['widget_id'];?> <?php print $widget_data['fields']['background_color']; ?>">
  <div class="content-area">
    <div class="w-message"><?php print $widget_data['fields']['message']; ?></div>
    <?php if (isset($widget_data['fields']['buttons']) && is_array($widget_data['fields']['buttons'])): ?>
      <div class="w-buttons">
        <?php foreach ($widget_data['fields']['buttons'] as $button): ?>
          <a href="<?php print $button['link']; ?>" class="btn <?php print $button['color']; ?>"><?php print $button['title']; ?></a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>        
  </div>
  <div class="w-close"><svg class="i-svg icon-close-2"><use xlink:href="#icon-close-2"></use></svg></div>
</div>
