<div id="products-block" class="products-block">
  <div class="content-area">
    <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['products']['title_color']?>"><?php print $template_data['fields']['products']['title']?></h2>
    <div data-aos="fade-left" class="p-main-subtitle"><?php print $template_data['fields']['products']['subtitle']?></div>
  </div>
  <div class="products-slider-wrapper">
    <div class="p-slider-nav-container">
      <div data-aos="fade-right" class="p-slider-arrow slider-prev">
        <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
      </div>
      <div data-aos="fade-left" class="p-slider-arrow slider-next">
        <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
      </div>
    </div>
    <div class="products-slider">
      <?php foreach ($template_data['fields']['products']['products_list'] as $index => $product): ?>
      <div data-aos-duration="800" data-aos="flip-left" class="product-wrapper product-wrapper-<?php print $index ?>">
        <a href="<?php print $product['link'];?>" class="product">
          <img data-lazy="<?php print kama_thumb_src(array('src' =>  $product['icon']['url'],'w' => 110,'h' => 110));?>" alt="<?php print $product['icon']['alt'];?>" class="p-icon" />
          <div class="p-title"><?php print $product['title'];?></div>
          <div class="p-subtitle"><?php print $product['subtitle'];?></div>
          <div class="p-description"><?php print $product['description'];?></div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
