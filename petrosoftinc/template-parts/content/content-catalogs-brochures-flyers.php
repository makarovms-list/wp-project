<?php 
  $catalogs_brochures_flyers_fields = get_field('catalogs_brochures_flyers_fields');
  $term_list = wp_get_post_terms(get_the_ID(),'cbf_category');
?>  
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
    <h1><?php the_title(); ?></h1>
    <div class="p-status">
      <div class="p-data">
        <?php if (isset($term_list[0]->slug)) : ?>
          <div class="p-file"><a href="<?php print '/catalogs-brochures-flyers?taxonomy=cbf_category&taxonomy_terms='.$term_list[0]->slug.'&taxonomy_operator=IN'?>"><?php print $term_list[0]->name ?></a> | <?php print $catalogs_brochures_flyers_fields['file']['subtype']; ?> <?php print petrosoft_convert_bytes_to_specified($catalogs_brochures_flyers_fields['file']['filesize'],'M'); ?> MB </div>
        <?php endif; ?>
      </div>
      <div class="p-sharing">
          <div class="p-s-title">Share:</div>
          <div class="p-s-links">
            <a class="post-social-share-link linkedin" href="http://www.linkedin.com/shareArticle?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a>
            <a class="post-social-share-link facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
            <a class="post-social-share-link twitter" href="https://twitter.com/share?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
            <a class="post-social-share-link s-mail" href="mailto:?subject=A link from petrosoftinc.com&body=<?php the_title(); ?> <?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-mail"><use xlink:href="#icon-mail"></use></svg></a>
          </div>  
      </div>
    </div>
		<div class="text-content">
      <?php the_content(null,true);?>
    </div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
