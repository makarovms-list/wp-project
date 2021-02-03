<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
<div class="content color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content__text">
                  <div class="content-area search-page">
                    <h1>Search</h1>
                    <?php get_search_form(); ?>
                    <div class="results text-content">
                      <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <div class="post-title"> <?php the_title(); ?></div>
                        <?php $main_page_banner = get_field( "main_page_banner", get_the_ID());?>
                        <?php if (isset($main_page_banner['banner_text']) && $main_page_banner['banner_text'] != ''): ?>
                          <p><?php print $main_page_banner['banner_text']; ?></p>
                        <?php else: ?>
                          <?php the_excerpt(); ?>
                        <?php endif; ?>
                        <a class="p-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>Learn more</span></a>
                      <?php endwhile; ?> 
                      <?php
                        the_posts_pagination( array(
                          'show_all'     => false,
                          'end_size'     => 1,
                          'mid_size'     => 1,
                          'prev_next'    => true, 
                          'prev_text'    => __('« Previous'),
                          'next_text'    => __('Next »'),
                          'add_args'     => false,
                          'add_fragment' => '',
                        ) );
                      ?>
                      <?php else : ?>
                        <p class="post-title"><?php _e('Sorry, no pages matched your criteria.'); ?></p>
                      <?php endif; ?>
                    </div>
                    
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();