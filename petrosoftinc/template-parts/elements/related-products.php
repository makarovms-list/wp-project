<div id="related-products-block" class="related-products-block">
  <div class="rp-header">
    <h2 class="line-title <?php print $template_data['fields']['related_products']['title_color']?>"><?php print $template_data['fields']['related_products']['title']?></h2>
    <a class="rp-more-link" href="<?php print $template_data['fields']['related_products']['more_link'];?>"><span>More Products</span><svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
  </div>  
  <?php if (is_array($template_data['fields']['related_products']['products'])): ?>
    <div class="r-products-list">
      <?php foreach ($template_data['fields']['related_products']['products'] as $product): ?>
        <div class="r-product">
          <a class="rp-image-link" href="<?php print $product['product_link']; ?>">
            <picture>
              <source srcset="<?php print kama_thumb_src(array('src' =>  $product['image']['url'],'w' => 360,'h' => 270));?>" media="(max-width: 1199px)">
              <img alt="<?php print $product['image']['alt'];?>" class="rp-image" src="<?php print kama_thumb_src(array('src' => $product['image']['url'],'w' => 270,'h' => 270))?>" srcset="<?php print kama_thumb_src(array('src' =>  $product['image']['url'],'w' => 540,'h' => 540));?> 2x">
            </picture>
          </a>
          <a class="rp-title" href="<?php print $product['product_link'];?>"><?php print $product['title'];?></a>
          <div class="rp-description"><?php print $product['description'];?></div>
          <a class="rp-price" href="<?php print $product['product_link'];?>"><?php print $product['price'];?></a>
        </div>
      <?php endforeach; ?>
    </div> 
  <?php endif; ?>
</div>
