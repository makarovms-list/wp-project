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
$right_side_content = get_field('right_side_content');
$videos_fields = get_field('videos_fields');

?>

<div class="content knowledge-center single-video side-block-page">
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
                        <div class="p-main-video-wrapper">
                          <video id="main-video" width="100%" height="auto" controls="controls">
                            <source src="<?php print $videos_fields['video']['url']; ?>" type='video/mp4'>
                          </video>
                          <div style="background-image: url('<?php print kama_thumb_src('w=1904&h=1071&post_id='.get_the_ID());?>')" class="p-video-overlay">
                            <div class="p-overlay-color"></div>
                            <div class="p-video-play"><svg class="i-svg icon-play"><use xlink:href="#icon-play"></use></svg></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="vc_row wpb-mobile-paddign-top-0 wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-8">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">    
                        <?php
                            get_template_part( 'template-parts/content/content', 'video' );
                          ?>
                      </div>
                    </div>
                  </div>
                  <div class="wpb_column vc_column_container vc_col-sm-4 wpb-margin-top-32 ">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">
                        <?php print petrosoftGetSideBlocks(get_the_ID()); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php get_template_part('template-parts/knowledge-center/videos-related-posts'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?php
get_footer();
