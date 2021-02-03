<?php if (isset($template_data['fields']['customers_stories_videos']['video_blocks']) && is_array($template_data['fields']['customers_stories_videos']['video_blocks'])): ?>
  <div class="customers-stories-videos-block content-area" id="customers-stories-videos-block">
    <div data-aos="fade-up" class="line-title <?php print $template_data['fields']['customers_stories_videos']['title_color'];?>"><?php print $template_data['fields']['customers_stories_videos']['title'];?></div>
    <div class="cs-videos">
      <?php foreach ($template_data['fields']['customers_stories_videos']['video_blocks'] as $index => $video_block):?>
        <div data-aos="flip-left" class="cs-video-block">
          <?php if (isset($video_block['video']['url']) || $video_block['external_video'] != ''):?>
            <a rel="modal:open" class="csv-image open-modal" href="#cs-video-modal-<?php print $index?>">
              <picture>
                <source srcset="<?php print kama_thumb_src(array('src' => $video_block['image']['url'],'w' => 767,'h' => 533));?>" media="(min-width: 481px) and (max-width: 767px)">
                <source srcset="<?php print kama_thumb_src(array('src' => $video_block['image']['url'],'w' => 440,'h' => 305));?>" media="(max-width: 480px)">
                <img alt="<?php print $video_block['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' => $video_block['image']['url'],'w' => 360,'h' => 250));?>" srcset="<?php print kama_thumb_src(array('src' =>  $video_block['image']['url'],'w' => 720,'h' => 500));?> 2x">
              </picture>
              <div class="play-icon-wrapper"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div>
            </a>
            <div id="cs-video-modal-<?php print $index ?>" class="modal">
              <div class='video-embed-container'>
                <?php if (isset($video_block['video']['url'])): ?>
                  <video style="width: 100%" controls>
                    <source src="<?php print $video_block['video']['url']; ?>" type="video/mp4">
                    Your browser doesn't support HTML5 video tag.
                  </video>
                <?php else: ?>
                  <?php print $video_block['external_video']; ?>
                <?php endif; ?>
              </div>
            </div>
          <?php else: ?>
            <div class="csv-image">
              <picture>
                <source srcset="<?php print kama_thumb_src(array('src' => $video_block['image']['url'],'w' => 767,'h' => 533));?>" media="(min-width: 481px) and (max-width: 767px)">
                <source srcset="<?php print kama_thumb_src(array('src' => $video_block['image']['url'],'w' => 440,'h' => 305));?>" media="(max-width: 480px)">
                <img alt="<?php print $video_block['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' => $video_block['image']['url'],'w' => 360,'h' => 250));?>" srcset="<?php print kama_thumb_src(array('src' =>  $video_block['image']['url'],'w' => 720,'h' => 500));?> 2x">
              </picture>
            </div>
          <?php endif ?>
          <div class='csv-title'><?php print $video_block['title'] ?></div>
          <?php if(isset($video_block['subtitle']) && $video_block['subtitle'] != ''):?>
            <div class='csv-subtitle'><?php print $video_block['subtitle'] ?></div>
          <?php endif; ?>
          <div class='csv-text'><?php print $video_block['text'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
 </div>
<?php endif; ?>
