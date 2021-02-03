<?php get_header(); ?>
<?php 
$id = petrosoft_crypt($unsubscribe_job_id,'d');
$post = get_post($id);
if ($post->post_type == 'wpcf7s') {
  $meta = get_post_meta($id);
  $name = $meta['wpcf7s_posted-subscriber-name'][0];
  $email = $meta['wpcf7s_posted-subscriber-email'][0];
  wp_delete_post($id);
}
?>
<div class="content color unsubscribe-job-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content__text">
                  <div class="content-area">
                    <?php if (isset($name) && $name != ''): ?>
                      <h2>Unsubscribe successfull</h2>
                      <div><?php print $name ?> you have been unsubscribed from jobs emails</div>
                    <?php else: ?>
                        <h2>Wrong subscriber id</h2>
                    <?php endif; ?>  
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
