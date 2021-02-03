<?php 
  $categories = get_the_category();
  $resources_form = get_field('resources_form', get_the_ID());
  $download_form_fields = get_field("download_form"); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
    <h1><?php the_title(); ?></h1>
    <div class="p-data">
      <?php foreach ($categories as $category_data):?>
        <a href="<?php print get_category_link($category_data->cat_ID); ?>" style="background-color: <?php print get_term_meta($category_data->cat_ID, 'cc_color', true);?>" class="p-category-link"><?php print $category_data->name;?></a>
      <?php endforeach; ?>
    </div>
    <div class="p-content-container">
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
        <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" class="p-main-image" src="<?php print kama_thumb_src('w=360&h=465&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=720&h=930&post_id='.get_the_ID());?> 2x">
      </div>
      <div class="text-content">
        <?php the_content(null,true);?>
      </div>
      <div class="clearfix"></div>
    </div>
    <?php if(isset($download_form_fields[0]['leadsource']) && $download_form_fields[0]['leadsource'] != '' && isset($download_form_fields[0]['file_url']) && $download_form_fields[0]['file_url'] != ''):?>
      <div class="resources-form-container">
        <?php print do_shortcode('[cf7form cf7key="resource-form" leadsource="'.$download_form_fields[0]['leadsource'].'" file-url="'.$download_form_fields[0]['file_url'].'"]');?>
      </div>
    <?php endif; ?>
    <div data-aos="fade-left" class="p-sharing-block">
      <div class="p-s-title">Share Article</div>
      <div class="p-s-links">
        <a class="social-share-link linkedin" href="http://www.linkedin.com/shareArticle?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a>
        <a class="social-share-link facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
        <a class="social-share-link twitter" href="https://twitter.com/share?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
        <a class="social-share-link s-mail" href="mailto:?subject=A link from petrosoftinc.com&body=<?php the_title(); ?> <?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-mail"><use xlink:href="#icon-mail"></use></svg></a>
      </div>
    </div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
