<?php if (isset($template_data['mobile_background_image']['url'])): ?>
    <style>
        @media (max-width: 1199px) {
          .client-comment-block {
            background-image: url('<?php print $template_data['mobile_background_image']['url']; ?>') !important;
          }
        }
    </style>
<?php endif; ?>
<div class="client-comment-block" style="background-color: <?php print $template_data['background_color']; ?>; <?php if(isset($template_data['background_image']['url'])) print 'background-image: url('.$template_data['background_image']['url'].');'; ?>">
  <div class="content-area">
      <div class="cc-text-part">
        <div class="cc-comment" style="color: <?php print $template_data['text_color']; ?>"><?php print $template_data['comment']?></div>
        <div class="cc-name" style="color: <?php print $template_data['text_color']; ?>"><?php print $template_data['name']?></div>
        <div class="cc-post" style="color: <?php print $template_data['text_color']; ?>"><?php print $template_data['post']?></div>
        <a class='btn with-icon open-modal' href="#"><svg class="i-svg icon-play_2"><use xlink:href="#icon-play_2"></use></svg>WATCH VIDEO</a>
        <?php if (isset($template_data['link']) && $template_data['link'] != ''): ?>
          <a class='btn open-modal <?php print $template_data['button_color'];?>' href="<?php print $template_data['link']; ?>">WATCH VIDEO</a>
        <?php endif; ?>
      </div>
      <img alt="<?php print $template_data['photo']['alt'];?>" class="cc-photo" src="<?php print $template_data['photo']['url']?>">
  </div>
</div>