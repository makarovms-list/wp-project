<?php get_header(); ?>
<div class="content side-block-page product-page-content color">
    <?php
      get_template_part( 'template-parts/products/products_banner');
    ?>
    <div class="container with-side-block-wrapper">
          <?php print petrosoft_get_products_menu(get_the_ID()); ?>
          <div class="content__text">
            <div class="product-page-content-block product-breadcrumb">  
              <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<div class="breadcrumbs" id="breadcrumbs">','</div>' );
                }
              ?>
            </div>
            <?php
              the_post();
              the_content();
            ?>
            <div class="product-page-footer">  
              <?php print petrosoft_get_products_footer(get_the_ID()); ?>
            </div>
          </div>
    </div>
</div>
<?php get_footer();