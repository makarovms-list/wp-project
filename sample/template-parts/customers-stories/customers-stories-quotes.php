<?php
  $cat = get_query_var('cat');
  $category = get_category ($cat);
  $quotes = get_field('customers_quotes', $category);
?>
<?php if(isset($quotes) && count($quotes) > 0):?>
  <div class="customers-quotes">
    <div class="content-area">
      <h2 data-aos="fade-up" class="line-title">View More Customer Quotes</h2>
      <div class="c-quotes-list">
        <?php foreach ($quotes as $quote):?>
          <div data-aos="flip-left" class="c-quote">
            <div class="c-title"><?php print $quote['title']?></div>
            <div class="c-text"><?php print $quote['text']?></div>
            <div class="c-person">
              <div class="c-image">
                <?php if(isset($quote['image']['url'])): ?>
                  <img alt="<?php print $quote['image']['alt'];?>" style="box-shadow: 0px 4px 15px <?php print hex2rgba($quote['shadow_color'],0.36);?>" src="<?php print kama_thumb_src(array('src' =>  $quote['image']['url'],'w' => 80,'h' => 80));?>" srcset="<?php print kama_thumb_src(array('src' =>  $quote['image']['url'],'w' => 160,'h' => 160));?> 2x">
                <?php else: ?>
                  <div style="background: <?php print $quote['background_color']?>; box-shadow: 0px 4px 15px <?php print hex2rgba($quote['shadow_color'],0.36);?>" class="c-dummy"><?php print substr($quote['name'], 0, 1); ?></div>
                <?php endif; ?>
              </div>
              <div class='c-person-data'>
                <div class='c-name'><?php print $quote['name']?>,</div>
                <div class='c-post'><?php print $quote['post']?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>  
  </div>
<?php endif; ?>