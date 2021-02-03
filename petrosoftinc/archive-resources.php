<?php
get_header();
?>

<div class="archive-page resources resources-archive">
  <div class="content">
    <section id="primary" class="container content-area">
      <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row">
        <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-3 vc_col-md-12 vc_col-xs-12">
          <div class="vc_column-inner">
            <div class="side-block-wrapper archive-side-block">
              <div class="side-block">
                <div class="side-block-content">
                  <?php
                    get_template_part( 'template-parts/resources/resources', 'side-block' );
                  ?>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-9 vc_col-md-12 vc_col-xs-12">
          <div class="vc_column-inner">
            <main data-aos="fade-up" data-aos-id="main" id="main" class="site-main">
              <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<div class="breadcrumbs" id="breadcrumbs">','</div>' );
                }
              ?>
              <div class="archive-top-block">
                <?php
                  get_template_part( 'template-parts/resources/resources', 'archive-top' );
                ?>
              </div>
              <h2 class="line-title">Recent Resources</h2>
              <?php
                get_template_part( 'template-parts/resources/resources', 'archive-content' );
              ?>
            </main><!-- #main -->
          </div>
        </div>
      </div>
    </section><!-- #primary -->
  </div>
</div>
<?php
get_footer();