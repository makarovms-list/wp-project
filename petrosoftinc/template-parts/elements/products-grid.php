<div id="products-grid-block" class="products-grid-block">
  <div class="content-area">
    <div data-aos="fade-up" class="line-title double <?php print $template_data['fields']['products_grid']['title_color']?>">
      <h2 class="l-title"><?php print $template_data['fields']['products_grid']['title']?></h2>
      <div data-aos="fade-left" class="l-subtitle"><?php print $template_data['fields']['products_grid']['subtitle']?></div>
    </div>
    <div class="vc_row wpb_row vc_inner vc_row-fluid products-grid flex-row">
      <?php foreach ($template_data['fields']['products_grid']['products_list'] as $index => $product): ?>
      <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-4 vc_col-xs-12">
        <div data-aos="flip-left" class="vc_column-inner">
          <a href="<?php print $product['link']; ?>" data-aos-duration="800" data-aos="flip-left" class="product">
            <div class="p-logo-wrapper">
              <img src="<?php print $product['logo']['url']; ?>" alt="<?php print $product['logo']['alt'];?>" class="p-logo" />
            </div>
            <div class="p-title"><?php print $product['title'];?></div>
            <div class="p-description"><?php print $product['description'];?></div>
            <div class="p-more-link"><span>Explore</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></div>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
