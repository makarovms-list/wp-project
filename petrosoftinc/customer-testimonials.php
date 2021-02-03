<?php
/*
Template Name: Customer Testimonials
Template Post Type: page
*/

$stories_slider = get_field('stories_slider');
?>
<?php get_header(); ?>
<div class="content side-block-page wpb-side-block-page color">
    <div class="container with-side-block-wrapper">
          <?php print petrosoft_get_knowledge_center_menu(); ?>
          <div class="content__text">
            <div class="page-breadcrumb">  
              <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<div class="breadcrumbs" id="breadcrumbs">','</div>' );
                }
              ?>
            </div>
            <div class="side-block-page-content-element-wrapper">
              <?php print petrosoft_get_template('/template-parts/single-stories-slider',array('fields' => array('stories_slider' => $stories_slider))); ?>
            </div>
            <?php
              the_post();
              the_content();
            ?>
          </div>
    </div>
</div>
<?php get_footer();