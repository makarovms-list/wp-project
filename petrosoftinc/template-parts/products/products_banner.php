<?php 
  $product_banner = get_field('product_banner');
?>
<?php if(isset($product_banner['slides']) && (is_array($product_banner['slides'])) && count($product_banner['slides']) > 0):  ?>
<div style="background-color: <?php print $product_banner['background_color'];?>;" class="product-banner">
    <div style='visibility: hidden' class='product-banner-slides'>
      <?php foreach($product_banner['slides'] as $slide): ?>
      <div class="p-b-slide">
        <div class="content-area">
          <div class='p-b-text'>
            <?php print $slide['text']; ?>
          </div>
          <img  class='p-descktop-image' src="<?php print $slide['image']['url']; ?>" srcset="<?php print kama_thumb_src(array('src' =>  $slide['image']['url'],'w' => $slide['image']['width']*2,'h' => $slide['image']['height']*2));?> 2x" >
        </div>
        <img  class='p-mobile-image' src="<?php print $slide['mobile_image']['url']; ?>" srcset="<?php print kama_thumb_src(array('src' =>  $slide['mobile_image']['url'],'w' => $slide['mobile_image']['width']*2,'h' => $slide['mobile_image']['height']*2));?> 2x" >
      </div>
      <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

