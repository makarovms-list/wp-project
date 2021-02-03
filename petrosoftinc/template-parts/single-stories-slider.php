<?php if(isset($template_data['fields']['stories_slider']['slides']) && is_array($template_data['fields']['stories_slider']['slides']) && count($template_data['fields']['stories_slider']['slides']) > 0): ?>
  <div id="stories-slider-block" class="stories-slider-block">
    <div class="stories-slider">
      <?php foreach($template_data['fields']['stories_slider']['slides'] as $index => $slide): ?>
        <div class="s-slide">
          <div class="s-slide-content-wrapper" style="background-color: <?php print $slide['background_color']; ?>">
              <img class="s-image" src="<?php print $slide['image']['url'] ?>" srcset="<?php print kama_thumb_src(array('src' =>  $slide['image']['url'],'w' => $slide['image']['width']*2,'h' => $slide['image']['height']*2));?> 2x"/>
              <div class="s-text-part">
                <div class="s-title"><?php print $slide['title']?></div>
                <div class="s-name"><?php print $slide['name']?></div>
                <div class="s-post"><?php print $slide['post']?></div>
                <?php if (isset($slide['video']['url'])): ?>
                  <a href="#stories-video-<?php print $index ?>" class="btn with-icon white-border open-modal"><div class="s-video-icon"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div><span>WATCH THE STORY</span></a>
                <?php endif; ?>
              </div>
              <div class="s-bullets bullets"></div>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php foreach($template_data['fields']['stories_slider']['slides'] as $index => $slide): ?>
  <?php if (isset($slide['video']['url'])): ?>
    <div id="stories-video-<?php print $index ?>" class="modal">
        <video style="width: 100%" controls>
          <source src="<?php print $slide['video']['url']; ?>" type="video/mp4">
          Your browser doesn't support HTML5 video tag.
        </video>
    </div>
  <?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

