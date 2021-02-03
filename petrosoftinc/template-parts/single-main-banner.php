<div class="main-banner" style="background-color: <?php print $template_data['main_banner']['background_color'] ?? '#3E74E7'; ?>">
  <?php if (isset($template_data['main_banner']['video']['url'])):?>
    <div class="video-wrapper">
      <video class="main-banner-video" autoplay muted loop id="main-banner-video">
        <source src="<?php print $template_data['main_banner']['video']['url']?>" type="video/mp4">
      </video>
    </div>
  <?php endif; ?>
  <div class="main-banner-text-wrapper">
    <div class="main-banner-text-container">
      <div class="main-banner-text">
        <h1><?php print $template_data['main_banner']['title'] ?? get_the_title(); ?></h1>
        <div class="main-banner-description"><?php print $template_data['main_banner']['description'] ?? ''; ?></div>
        <a class="btn main-banner-btn" href="<?php print $template_data['main_banner']['link'] ?? '#'; ?>">SCHEDULE A DEMO</a>
      </div>
    </div>
  </div>
</div>