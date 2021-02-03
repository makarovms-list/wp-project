<?php get_header(); ?>
<div class="content color">
    <div class="container">
      <div class="content__text">
					<?php
						the_post();
						the_content();
					?>
      </div>
    </div>
</div>
<?php get_footer();