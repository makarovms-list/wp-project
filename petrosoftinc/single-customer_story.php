<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage petrosoftinc
 * @since 1.0.0
 */

get_header();
petrosoftinc_set_post_view();
$form = get_field('form', get_the_ID());
?>

<div class="blog blog-post customers-stories customers-stories-post">
  <div class="content">
    <section id="primary" class="content-area">
        <?php get_template_part( '/template-parts/customers-stories/customers-stories', 'menu' ); ?>
        <main data-aos="fade-up" data-aos-id="main" id="main" class="site-main">
          <?php
          /* Start the Loop */
          while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/content', 'customer-story' );
          endwhile; // End of the loop.
          ?>
        </main><!-- #main -->
        <aside data-aos="fade-left" class="sidebar right-sidebar">
           <?php get_template_part('template-parts/customers-stories/customers-stories','related-posts' ); ?>
        </aside>  
    </section><!-- #primary -->
  </div>
  <?php if(isset($form) && $form != ''):?>
    <div class="content-area cs-form-container">
      <div class="cs-form">
        <?php print $form; ?>
      </div>
    </div>
  <?php endif; ?>
  <?php get_template_part('template-parts/blog/blog','social-networks' ); ?>
</div>
<?php
get_footer();
