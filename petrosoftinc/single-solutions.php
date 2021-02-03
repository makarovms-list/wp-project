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
$main_banner = get_field('main_banner');
?>

<div class="container content solution wpb-page">
  <?php print petrosoft_get_template('/template-parts/single-main-banner', array('main_banner' => $main_banner));?>
  <div class="vc_row wpb_row vc_row-fluid breadcrumb-wrapper">
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner">
        <div class="wpb_wrapper">
          <div class="vc_row wpb-paddign-top-0 wpb_row vc_row-fluid wpb-mobile-margin-top-32">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                      yoast_breadcrumb( '<div class="breadcrumbs" id="breadcrumbs">','</div>' );
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    the_post();
    the_content();
  ?>
</div>
<?php
get_footer();
