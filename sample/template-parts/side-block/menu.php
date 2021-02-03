<a class="btn mobile-side-schedule-a-demo-button <?php print $template_data['fields']['schedule_a_demo_color']; ?>" href="#">SCHEDULE A DEMO</a>
<div class="mobile-side-block-toggle"><div class="t-closed"><div class="t-title">Menu</div><svg class="i-svg icon-arrow-5"><use xlink:href="#icon-arrow-5"></use></svg>  </div><div class="t-opened"><svg class="i-svg icon-close-4"><use xlink:href="#icon-close-4"></use></svg></div></div>
<div class="side-block">
  <div class="side-block-content menu-side-block-wrapper">
    <div class="menu-side-block">
      <div class="side-data">
        <img class="sd-logo" src="<?php print $template_data['fields']['logo']['url'] ?>" srcset="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['logo']['url'],'w' => $template_data['fields']['logo']['width']*2,'h' => $template_data['fields']['logo']['height']*2));?> 2x"/>
        <a class="btn side-schedule-a-demo-button <?php print $template_data['fields']['schedule_a_demo_color']; ?>" href="#">SCHEDULE A DEMO</a>
      </div>  
      <div class="side-menu">
        <ul>
          <?php foreach ($template_data['links'] as $link):?>
          <li>
            <a class="<?php foreach ($link->classes as $class):?><?php print $class; ?> <?php endforeach; ?>" href="<?php print $link->url ?>"><?php print $link->title ?> <?php if (in_array('external',$link->classes)): ?> <svg class="i-svg icon-external"><use xlink:href="#icon-external"></use></svg> <?php endif; ?></a>
            <?php if (isset($link->children)): ?>
            <ul>
                <?php foreach ($link->children as $child_link):?>
                  <li> <a class="<?php foreach ($child_link->classes as $class):?><?php print $class; ?> <?php endforeach; ?>" href="<?php print $child_link->url ?>"><?php print $child_link->title ?><?php if (in_array('external',$child_link->classes)): ?> <svg class="i-svg icon-external"><use xlink:href="#icon-external"></use></svg> <?php endif; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>