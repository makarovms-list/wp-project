<?php
/*
Template Name: Knowledge center page
Template Post Type: page
*/

$materials_slider_fields = get_field('materials_slider_fields');
?>
<?php get_header(); ?>
<div class="content side-block-page wpb-side-block-page knowledge-center-page color">
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
              <?php print petrosoft_get_template('/template-parts/knowledge-center/materials-slider', array('acf_fields' => $materials_slider_fields));?>
            </div>
            <?php
              the_post();
              the_content();
            ?>
          </div>
    </div>
</div>
<?php get_footer();