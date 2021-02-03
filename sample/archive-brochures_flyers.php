<?php
get_header();
?>
<div class="content archive-page knowledge-center brochures-flyers-archive side-block-page">
  <div class="container with-side-block-wrapper">
      <?php print petrosoft_get_knowledge_center_menu(); ?>
      <div class="content__text">
        <div class="vc_row wpb_row vc_row-fluid">
          <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
              <div class="wpb_wrapper">
                <div class="vc_row wpb-paddign-top-0 wpb_row vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                      <div class="wpb_wrapper">
                        <?php
                          if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<div class="breadcrumbs" id="breadcrumbs">','</div>' );
                          }
                        ?>
                        <div class="archive-top-block">
                          <?php
                            print petrosoft_get_template( 'template-parts/knowledge-center/materials-slider', array('acf_fields' => get_field('catalogs_brochures_flyers_catalog_fields', 'option')));
                          ?>
                        </div>
                        <h1>Catalogs, Brochures, Flyers</h1>
                        <?php print petrosoft_get_categories_block('cbf_category','/catalogs-brochures-flyers'); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  get_template_part( 'template-parts/knowledge-center/catalogs-brochures-flyers-content');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?php
get_footer();