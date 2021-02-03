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
the_post();
petrosoftinc_set_post_view();
?>

<div class="content knowledge-center single-toolkits single-post side-block-page">
  <div class="container with-side-block-wrapper">
      <?php print petrosoft_get_knowledge_center_menu(); ?>
      <div class="content__text">
        <div class="vc_row wpb_row vc_row-fluid">
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
                <div class="vc_row wpb-paddign-top-0 wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-7">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">    
                          <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" class="p-main-image" src="<?php print kama_thumb_src('w=542&h=320&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=1084&h=640&post_id='.get_the_ID());?> 2x">
                        <?php
                            get_template_part( 'template-parts/content/content', 'toolkits' );
                          ?>
                      </div>
                    </div>
                  </div>
                  <div class="wpb_column vc_column_container vc_col-sm-5 wpb-mobile-margin-top-32 ">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">
                        <div class="p-form-placeholder"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?php
get_footer();
