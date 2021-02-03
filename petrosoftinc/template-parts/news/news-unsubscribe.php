<?php get_header(); ?>
<?php 
$id = petrosoft_crypt($unsubscribe_news_id,'d');
$post = get_post($id);
if ($post->post_type == 'wpcf7s') {
  $meta = get_post_meta($id);
  $email = $meta['wpcf7s_posted-email'][0];
  $post = [
    '004' => $email,
    'source' => 'campaign',
  ];
  if (isset($email) && $email != '') {
    $ch = curl_init('https://analytics.clickdimensions.com/forms/h/aq15K9Blki02qeym69oNDw');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    curl_close($ch);
    wp_delete_post($id);
  }
}
?>
<div class="content color unsubscribe-job-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content__text">
                  <div class="content-area">
                    <?php if (isset($email) && $email != ''): ?>
                      <h2>Unsubscribe successfull</h2>
                      <div><?php print $email ?> unsubscribed from news emails</div>
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
