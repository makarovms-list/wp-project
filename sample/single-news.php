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

<div class="content knowledge-center single-news side-block-page">
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
                        <picture>
                          <source srcset="<?php print kama_thumb_src('w=735&h=447&post_id='.get_the_ID());?>" media="(min-width: 481px) and (max-width: 767px)">
                          <source srcset="<?php print kama_thumb_src('w=448&h=227&post_id='.get_the_ID());?>" media="(max-width: 480px)">
                          <img alt="<?php print petrosoft_get_post_image_alt(get_the_ID());?>" class="p-main-image" src="<?php print kama_thumb_src('w=952&h=330&post_id='.get_the_ID());?>" srcset="<?php print kama_thumb_src('w=1904&h=660&post_id='.get_the_ID());?> 2x">
                        </picture>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="vc_row wpb-mobile-paddign-top-0 wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-8">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">    
                        <?php
                            get_template_part( 'template-parts/content/content', 'post' );
                          ?>
                      </div>
                    </div>
                  </div>
                  <div class="wpb_column vc_column_container vc_col-sm-4 wpb-mobile-margin-top-32 ">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">
                        <?php print petrosoftGetSideBlocks(get_the_ID()); ?>
                        <?php get_template_part('template-parts/knowledge-center/news-related-posts'); ?>
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
