<?php
$post_categories = wp_get_post_categories(get_the_ID());
$args = array(
  'post_type' => 'customer_story',
  'post_status' => 'publish',
  'exclude' => get_the_ID(),
  'category' => $post_categories,
  'numberposts' => 3,  
);
$related_posts = get_posts($args);
$related_posts_title = 'Related Stories';

?>
<div class="related-posts customers-stories-related-posts">
  <div class="rp-title"><?php print $related_posts_title ?></div>
  <div class="rp-container">
    <?php foreach ($related_posts as $related_post): ?>
      <?php
        $video = get_field( "video", $related_post->ID);
        $main_result = get_field( "main_result", $related_post->ID);
        $all_results = get_field( "all_results", $related_post->ID);
        $extended_modal = get_field("extended_modal_window", $related_post->ID);
      ?>
      <div class="rp-block">
      <?php if(isset($video) && $video != ''):?>
        <a rel="modal:open" class="rp-image-link open-modal" href="#video-modal-<?php print $related_post->ID?>">
          <picture>
            <source srcset="<?php print kama_thumb_src('w=1159&h=805&post_id='.$related_post->ID);?>" media="(min-width: 481px) and (max-width: 1199px)">
            <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.$related_post->ID);?>" media="(max-width: 480px)">
            <img alt="<?php print petrosoft_get_post_image_alt($related_post->ID);?>" src="<?php print kama_thumb_src('w=270&h=190&post_id='.$related_post->ID);?>" srcset="<?php print kama_thumb_src('w=540&h=380&post_id='.$related_post->ID);?> 2x" >
          </picture>
          <div class="play-icon-wrapper"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div>
        </a>
        <div id="video-modal-<?php print $related_post->ID?>" class="modal">
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
        <a class="rp-image-link" href="<?php print the_permalink($related_post->ID) ?>">
          <picture>
            <source srcset="<?php print kama_thumb_src('w=1159&h=805&post_id='.$related_post->ID);?>" media="(min-width: 481px) and (max-width: 1199px)">
            <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.$related_post->ID);?>" media="(max-width: 480px)">
            <img alt="<?php print petrosoft_get_post_image_alt($related_post->ID);?>" src="<?php print kama_thumb_src('w=270&h=190&post_id='.$related_post->ID);?>" srcset="<?php print kama_thumb_src('w=540&h=380&post_id='.$related_post->ID);?> 2x">
          </picture>
        </a>
      <?php endif;?>
        <a class='rp-block-title' href="<?php print the_permalink($related_post->ID) ?>"><?php print $related_post->post_title;?></a>
        <?php if($main_result != ''):?><div class="rp-main-result"><?php print $main_result ?></div><?php endif;?>
        <div class='rp-text'><?php print get_the_excerpt($related_post->ID);?></div>
        <?php if ($all_results && count($all_results) > 0):?>
          <div class="rp-all-results">
            <div class="rp-all-results-title">Results:</div>  
            <ul class="rp-all-results-list">
              <?php foreach ($all_results as $result):?>
                <li><svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg> <span><?php print $result['result'];?></span></li>
              <?php endforeach;?>
            </ul>
          </div>
        <?php endif;?>
        <a class="rp-more-link" href="<?php print the_permalink($related_post->ID) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
      </div>  
    <?php endforeach; ?>
  </div>
</div>