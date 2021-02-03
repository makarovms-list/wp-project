<?php
get_header();
?>

<div class="blog blog-category jobs jobs-category">
  <?php get_template_part('template-parts/jobs/jobs','menu' ); ?>
  <div class="content">
    <section id="primary" class="content-area">
        <main data-aos="fade-up" data-aos-id="main" id="main" class="site-main">
          <?php
            get_template_part( 'template-parts/jobs/jobs', 'category-content' );
          ?>
        </main><!-- #main -->
    </section><!-- #primary -->
  </div>
  <?php get_template_part('template-parts/jobs/jobs','subscribe-form' ); ?>
  <?php get_template_part('template-parts/blog/blog','social-networks' ); ?>
  <?php get_template_part('template-parts/jobs/jobs','contact-person'); ?>
</div>
<?php
get_footer();
