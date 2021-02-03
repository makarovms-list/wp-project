<?php
  $main_result = get_field('main_result', get_the_ID());
  $all_results_icon = get_field('all_results_icon', get_the_ID());
  $all_results_color = get_field('all_results_color', get_the_ID());
  $all_results = get_field('all_results', get_the_ID());
  $products_used_icon = get_field('products_used_icon', get_the_ID());
  $products_used_color = get_field('products_used_color', get_the_ID());
  $products_used = get_field('products_used', get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
    <h1><?php the_title(); ?></h1>
    <?php if(isset($main_result) && $main_result != ''):?>
    <div class="cs-main-result">
      <?php print $main_result ?>
    </div>
    <?php endif;?>
    <div class="p-main-image-container">
      <div class="p-fixed-sharing">
        <div class="p-fs-title">Share</div>
        <div class="p-fs-links">
          <a class="social-share-link linkedin" href="http://www.linkedin.com/shareArticle?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a>
          <a class="social-share-link facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
          <a class="social-share-link twitter" href="https://twitter.com/share?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
          <a class="social-share-link s-mail" href="mailto:?subject=A link from petrosoftinc.com&body=<?php the_title(); ?> <?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-mail"><use xlink:href="#icon-mail"></use></svg></a>
        </div>  
      </div>
      <picture>
        <source srcset="<?php print kama_thumb_src('w=1159&h=805&post_id='.get_the_ID());?>" media="(min-width: 481px) and (max-width: 1199px)">
        <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.get_the_ID());?>" media="(max-width: 480px)">
        <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" class="p-main-image" src="<?php print kama_thumb_src('w=800&h=550&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=1600&h=1100&post_id='.get_the_ID());?> 2x">
      </picture>
    </div>
    <div class="cs-results-container">
      <?php if(is_array($all_results) && count($all_results) > 0):?>
        <div data-aos="flip-up" class="cs-results-block cs-all-results">
          <div class="cs-results-title"><span>Results</span>
            <div class="cs-results-icon">
              <?php if(isset($all_results_icon['url'])):?>
                <img alt="<?php print $all_results_icon['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $all_results_icon['url'],'w' => 50,'h' => 50));?>" srcset="<?php print kama_thumb_src(array('src' => $all_results_icon['url'],'w' => 100,'h' => 100));?> 2x">
              <?php else: ?>
                <img alt="" src="<?php print kama_thumb_src(array('src' =>  get_template_directory_uri().'/images/cs-results-icon.png','w' => 50,'h' => 50));?>" srcset="<?php print kama_thumb_src(array('src' =>  get_template_directory_uri().'/images/cs-results-icon.png','w' => 100,'h' => 100));?> 2x">
              <?php endif ?>  
            </div>
          </div>  
          <ul class="cs-results-list cs-all-results-list">
            <?php foreach ($all_results as $result):?>
              <li><svg style="color: <?php print $all_results_color ?>" class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg> <span><?php print $result['result'];?></span></li>
            <?php endforeach;?>
          </ul>
        </div>  
      <?php endif; ?>
      <?php if(is_array($products_used) && count($products_used) > 0):?>
        <div data-aos="flip-up" class="cs-results-block cs-products-used">
          <div class="cs-results-title"><span>Products Used</span>
            <div class="cs-results-icon">
              <?php if(isset($products_used_icon['url'])):?>
                <img alt="<?php print $products_used_icon['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $products_used_icon['url'],'w' => 50,'h' => 50));?>" srcset="<?php print kama_thumb_src(array('src' => $products_used_icon['url'],'w' => 100,'h' => 100));?> 2x">
              <?php else: ?>
                <img alt="" src="<?php print kama_thumb_src(array('src' =>  get_template_directory_uri().'/images/cs-products-icon.png','w' => 50,'h' => 50));?>" srcset="<?php print kama_thumb_src(array('src' =>  get_template_directory_uri().'/images/cs-products-icon.png','w' => 100,'h' => 100));?> 2x">
              <?php endif ?>  
            </div>
          </div>  
          <ul class="cs-results-list cs-products-used">
            <?php foreach ($products_used as $product):?>
              <li><a style="color: <?php print $products_used_color ?>" href="<?php print $product['link'] ?>"><svg style="color: <?php print $products_used_color ?>" class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg> <span><?php print $product['product'];?></span></a></li>
            <?php endforeach;?>
          </ul>
        </div>  
      <?php endif; ?>
    </div>
		<div class="text-content">
      <?php the_content(null,true);?>
    </div>
    <div data-aos="fade-left" class="p-sharing-block">
      <div class="p-s-title">Share Post</div>
      <div class="p-s-links">
        <a class="social-share-link linkedin" href="http://www.linkedin.com/shareArticle?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a>
        <a class="social-share-link facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
        <a class="social-share-link twitter" href="https://twitter.com/share?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
        <a class="social-share-link s-mail" href="mailto:?subject=A link from petrosoftinc.com&body=<?php the_title(); ?> <?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-mail"><use xlink:href="#icon-mail"></use></svg></a>
      </div>
    </div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
