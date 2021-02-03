<div id="partners-catalog-block" class="partners-catalog-block">
  <?php foreach($template_data['fields']['partners_catalog'] as $partners_category): ?>
  <div class="p-c-category">
    <h2 data-aos="fade-down" class="line-title <?php print $partners_category['title_color']?>"><?php print $partners_category['title']?></h2>
    <?php if (isset($partners_category['list']) && count($partners_category['list'])): ?>
      <div class="p-c-partners-list">
        <?php foreach ($partners_category['list'] as $partner): ?>
          <div data-aos="zoom-in" class="p-c-partner">
            <a class="p-c-logo-link <?php print ($partner['link'] == '' ? 'nolink':'')?>" target="_blank" rel="nofollow" href="<?php print $partner['link']; ?>">
              <img class="p-c-logo" alt="<?php print $partner['logo']['alt'];?>" class="p-logo-image" src="<?php print $partner['logo']['url']?>"  srcset="<?php print kama_thumb_src(array('src' =>  $partner['logo']['url'],'w' => $partner['logo']['width']*2,'h' => $partner['logo']['height']*2));?> 2x">
            </a>
            <a class="p-c-partner-title <?php print ($partner['link'] == '' ? 'nolink':'')?>" target="_blank" rel="nofollow" href="<?php print $partner['link']; ?>">
              <?php print $partner['title'];?>
            </a>
            <div class="p-c-partner-text">
              <?php print $partner['text'];?> 
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php endforeach; ?>
</div>
