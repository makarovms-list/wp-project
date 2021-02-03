<div id="clients-say-block" class="clients-say-block">
  <div class="content-area">
    <h2  data-aos="fade-up" class="line-title white"><?php print $template_data['fields']['clients_say']['title']?></h2>
    <div class="comments vc_row wpb_row vc_inner vc_row-fluid flex-row">
      <?php foreach ($template_data['fields']['clients_say']['comments'] as $index => $comment): ?>
        <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
          <div class="vc_column-inner">
            <div data-aos-duration="800" data-aos="flip-left" class="comment wpb_wrapper">
              <div class="c-text"><?php print $comment['text'];?></div>
              <div class="c-client">
                <div class="c-name"><?php print $comment['name'];?></div>
                <div class="c-post"><?php print $comment['post'];?></div>
              </div>
              <a href="<?php print $comment['button_link'];?>" class="btn open-modal white"><?php print $comment['button_label'];?></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
