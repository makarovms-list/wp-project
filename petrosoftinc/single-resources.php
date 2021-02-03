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
?>

<div class="blog blog-post resources resources-post">
  <div class="content">
    <section id="primary" class="content-area">
        <?php get_template_part('template-parts/resources/resources','menu' ); ?>
        <main data-aos="fade-up" data-aos-id="main" id="main" class="site-main">
          <?php
          /* Start the Loop */
          while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/content', 'resource' );
          endwhile; // End of the loop.
          ?>
        </main><!-- #main -->
        <aside data-aos="fade-left" class="sidebar right-sidebar">
           <?php get_template_part('template-parts/resources/resources','related-posts' ); ?>
        </aside>
    </section><!-- #primary -->
  </div>
  <?php get_template_part('template-parts/blog/blog','social-networks' ); ?>
</div>
<?php
get_footer();
