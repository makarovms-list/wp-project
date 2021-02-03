<?php 
$job_location = wp_get_post_terms(get_the_ID(), 'jobs');
$form_name = 'job-application-international';

if ($job_location[0]->name == 'US') {
  $form_name = 'job-application';
}

$summary = get_field('summary', get_the_ID());
$responsibilities = get_field('responsibilities', get_the_ID());
$experience = get_field('experience', get_the_ID());

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
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
    </div>
		<div class="text-content">
      <h2>Summary</h2>
      <?php print $summary; ?>
      <?php if (isset($responsibilities) && $responsibilities != ''):?>
        <h2>Responsibilities:</h2>
        <?php print $responsibilities ?>
      <?php endif; ?>
      <?php if (isset($experience) && $experience != ''):?>
        <h2>Additional Experience:</h2>
        <?php print $experience; ?>
      <?php endif; ?>
      <?php print do_shortcode('[cf7form cf7key="'.$form_name.'" html_class="form job-application-form"]');?>
    </div>
    <div data-aos="fade-left" class="p-sharing-block">
      <div class="p-s-title">Share</div>
      <div class="p-s-links">
        <a class="social-share-link linkedin" href="http://www.linkedin.com/shareArticle?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a>
        <a class="social-share-link facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
        <a class="social-share-link twitter" href="https://twitter.com/share?url=<?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
        <a class="social-share-link s-mail" href="mailto:?subject=A link from petrosoftinc.com&body=<?php the_title(); ?> <?php print the_permalink(get_the_ID());?>"><svg class="i-svg icon-mail"><use xlink:href="#icon-mail"></use></svg></a>
      </div>
    </div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
