<?php
get_header();
?>

<div class="blog blog-category news news-category">
  <?php get_template_part('template-parts/news/news','menu' ); ?>
  <div class="content">
    <section id="primary" class="content-area">
        <main data-aos="fade-up" data-aos-id="main" id="main" class="site-main">
          <?php
           get_template_part( 'template-parts/news/news', 'category-content' );
          ?>
        </main><!-- #main -->
    </section><!-- #primary -->
  </div>
  <?php get_template_part('template-parts/blog/blog','social-networks' ); ?>
</div>
<?php
get_footer();