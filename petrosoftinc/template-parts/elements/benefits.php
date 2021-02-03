<div id="benefits-block" class="benefits-block">
  <div data-aos="fade-up" class="b-tabs-header">
    <div data-aos="fade-up" class="line-title double <?php print $template_data['fields']['benefits']['title_color'] ?>">
      <h2 class="l-title"><?php print $template_data['fields']['benefits']['title'];?></h2>
      <div data-aos="fade-left" class="l-subtitle"><?php print $template_data['fields']['benefits']['subtitle'];?></div>
    </div>
    <?php if (count($template_data['fields']['benefits']['benefits_tabs']) > 1):?>
    <select class="petrosoft-select">
      <?php foreach ($template_data['fields']['benefits']['benefits_tabs'] as $tab_index => $tab): ?>
        <option <?php print ($tab_index == 0) ? 'selected' : ''?> value="<?php print $tab_index ?>"><?php print $tab['title'];?></option>
      <?php endforeach; ?>
    </select>  
    <ul id="tabs-collapse" class="b-nav" role="tablist">
      <?php foreach ($template_data['fields']['benefits']['benefits_tabs'] as $tab_index => $tab):?>
        <li class="b-nav-link nav <?php print ($tab_index == 0) ? 'active' : ''?>"><a href="#benefits-t-<?php print $tab_index;?>" aria-controls="benefits-t-<?php print $tab_index;?>" role="tab" data-toggle="tab"><?php print $tab['title']; ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
  <div class="b-tabs tab-content">
    <?php foreach ($template_data['fields']['benefits']['benefits_tabs'] as $tab_index => $tab):?>
      <div role="tabpanel" class="b-tab tab-pane fade content-area <?php print ($tab_index == 0) ? 'active in' : ''?>" id="benefits-t-<?php print $tab_index;?>">
        <style>
          <?php foreach ($tab['benefits_list'] as $index => $benefit):?>
            .benefits-block .b-tabs .b-tab .b-tab-content .benefit-<?php print $tab_index; ?>-<?php print $index ?>:hover {
              box-shadow: 0 4px 30px <?php print hex2rgba($benefit['hover_color'],0.36);?>
            }
          <?php endforeach; ?>
        </style>
        <div class='b-tab-content'>
          <?php foreach ($tab['benefits_list'] as $index => $benefit):?>
            <div data-aos="flip-left" class='benefit benefit-<?php print $tab_index; ?>-<?php print $index; ?>'>
              <img alt="<?php print $benefit['icon']['alt']; ?>" class="b-icon" src="<?php print kama_thumb_src(array('src' =>  $benefit['icon']['url'],'w' => 110,'h' => 110));?>" srcset="<?php print kama_thumb_src(array('src' =>  $benefit['icon']['url'],'w' => 220,'h' => 220));?> 2x">
              <div class='b-title'><?php print $benefit['title'] ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>  
</div>