<?php
  get_header();
  $category = get_category (16);
  $clients_slider = get_field('clients_slider', $category);
  $video_popup = get_field('video_popup', $category);
  $customers_stories_videos = get_field('customers_stories_videos', $category);
  $template_data = array('fields' => array('clients_slider' => $clients_slider, 'customers_stories_videos' => $customers_stories_videos), 'element_fields' => array('video_popup' => $video_popup));
  set_query_var('template_data', $template_data);
?>
<div class="blog blog-category customers-stories customers-stories-category">
  <?php get_template_part('/template-parts/elements/clients-slider'); ?>
  <?php get_template_part( 'template-parts/customers-stories/customers-stories-video' ); ?>
  <?php get_template_part( '/template-parts/customers-stories/customers-stories', 'menu' ); ?>
  <div class="content">
    <section id="primary" class="content-area">
        <main data-aos="fade-up" data-aos-id="main" id="main" class="site-main">
          <?php
           get_template_part( 'template-parts/customers-stories/customers-stories', 'category-content' );
          ?>
        </main><!-- #main -->
    </section><!-- #primary -->
  </div>
  <?php get_template_part('template-parts/customers-stories/customers-stories-video-blocks' ); ?>
  <?php get_template_part('template-parts/customers-stories/customers-stories','quotes' ); ?>
  <?php get_template_part('template-parts/blog/blog','social-networks' ); ?>
</div>
<?php
get_footer();