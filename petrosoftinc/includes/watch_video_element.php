<?php

class Watch_Video_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Watch video';
  public static $description = 'Watch video';
  public static $fields = array(
    'watch_video',
    'watch_video_popup'
  );
  public static $template = 'template-parts/elements/watch-video';
}

new Watch_Video_Element;
