<div class="capabilities-block" class="capabilities-block">
  <?php if(is_array($template_data['fields']['capabilities'])):?>
    <?php foreach ($template_data['fields']['capabilities'] as $capability):?>
      <div class="capability">
        <h2 data-aos="fade-right" class="line-title <?php print $capability['title_color']?>"><?php print $capability['title']?></h2>
        <div class="c-content">
          <div data-aos="fade-right" class="c-description-wrapper">
            <div class="c-description"><?php print $capability['description']?></div>
            <?php if (is_array($capability['list'])): ?>
              <ul class="c-list">
                <?php foreach ($capability['list'] as $list_item):?>
                  <li><span><?php print $list_item['text']?></span> <svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
          <div data-aos="fade-up" class="c-image-wrapper">
            <?php if (isset($capability['image']['url'])):?>
              <img alt="<?php print $capability['image']['alt'];?>" class="c-image" src="<?php print kama_thumb_src(array('src' => $capability['image']['url'],'w' => 370,'h' => 270));?>"  srcset="<?php print kama_thumb_src(array('src' =>  $capability['image']['url'],'w' => 740,'h' => 540));?> 2x">
              <?php if (isset($capability['icon']['url'])):?>
                <img alt="<?php print $capability['icon']['alt'];?>" class="c-icon" src="<?php print kama_thumb_src(array('src' => $capability['icon']['url'],'w' => 100,'h' => 100));?>"  srcset="<?php print kama_thumb_src(array('src' =>  $capability['icon']['url'],'w' => 200,'h' => 200));?> 2x">
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php if (is_array($capability['used_by'])): ?>
            <div data-aos="fade-left" class="c-used-by-wrapper">
                <div class="c-used-by-title">Used by:</div>
                <ul class="c-used-by">
                  <?php foreach ($capability['used_by'] as $used_by): ?>
                    <li><svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg><span><?php print $used_by['text']?></span></li>
                  <?php endforeach; ?>
                </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>