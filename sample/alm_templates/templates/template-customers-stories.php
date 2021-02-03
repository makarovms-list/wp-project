<?php 
  $extended_modal = get_field("extended_modal_window", get_the_ID());
  $video = get_field( "video", get_the_ID());
  $main_result = get_field( "main_result", get_the_ID());
  $all_results = get_field( "all_results", get_the_ID());
?>
<div class="post post-<?php print get_the_ID()?>">
  <div class="p-image">
    <?php if(isset($video) && $video != ''):?>
      <a rel="modal:open" class="p-image-link open-modal" href="#video-modal-<?php print get_the_ID()?>">
        <picture>
          <source srcset="<?php print kama_thumb_src('w=767&h=533&post_id='.get_the_ID());?>" media="(min-width: 481px) and (max-width: 767px)">
          <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.get_the_ID());?>" media="(max-width: 480px)">
          <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" src="<?php print kama_thumb_src('w=360&h=250&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=720&h=500&post_id='.get_the_ID());?> 2x">
        </picture>
        <div class="play-icon-wrapper"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div>
      </a>
    
    <div id="video-modal-<?php print get_the_ID()?>" class="modal">
      <?php if($extended_modal['use_extended']):?>
        <div class="video-modal-content">
          <div class="m-video-wrapper">
            <div class='video-embed-container'>
              <?php print $video; ?>
            </div>
            <a href="<?php print $extended_modal['link'] ?>" class="btn"><?php print $extended_modal['button_label'] ?></a>
          </div>
          <div class="m-data-container">
            <div class="m-title">
              <?php print $extended_modal['title'] ?>
            </div>
            <div class="m-description">
              <?php print $extended_modal['description'] ?>
            </div>
            <div class="m-person">
              <?php print $extended_modal['person'] ?>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class='video-embed-container'>
          <?php print $video; ?>
        </div>
      <?php endif;?>
    </div>
    <?php else: ?>
      <a class="p-image-link" href="<?php print the_permalink(get_the_ID()) ?>">
        <picture>
          <source srcset="<?php print kama_thumb_src('w=767&h=533&post_id='.get_the_ID());?>" media="(min-width: 481px) and (max-width: 767px)">
          <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.get_the_ID());?>" media="(max-width: 480px)">
          <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" src="<?php print kama_thumb_src('w=360&h=250&post_id='.get_the_ID());?>">
        </picture>
      </a>
    <?php endif;?>
  </div>
  <div class='p-title'><?php the_title(); ?></div>
  <?php if($main_result != ''):?><div class='p-main-result'><?php print $main_result ?></div><?php endif;?>
  <div class='p-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('')), 45, '...' );?></div>
  <?php if ($all_results && count($all_results) > 0):?>
    <div class="p-all-results">
      <div class="p-all-results-title">Results:</div>  
      <ul class="p-all-results-list">
        <?php foreach ($all_results as $result):?>
          <li><svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg> <span><?php print $result['result'];?></span></li>
        <?php endforeach;?>
      </ul>
    </div>
  <?php endif;?>
  <a class="p-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
</div> 