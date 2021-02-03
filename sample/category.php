<?php get_header(); ?>
<link rel='stylesheet' id='js_composer_front-css'  href='/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=6.0.5' type='text/css' media='all' />
<style>
	.vc_col-sm-12 .wpb_wrapper {max-width: 1460px;margin: 0 auto;}
	.single_post {margin-bottom: 20px!important;}
	.single_post span.time {font-size: 14px!important;color: rgba(99,108,114,.498)!important;line-height: 19px!important;border-width: 0!important;font-family: Lato!important;}
	.single_post p.entry-title a {color: #333!important;text-decoration: none;font-size: 28px!important;line-height: 30px!important;}
	.single_post a.more-link {float: right;}
	
	span.time {font-size: 14px;color: rgba(99,108,114,.498);line-height: 19px;border-width: 0;}
	h1 {padding: 16px 0 30px;}
	img {max-width: 100%;}
	div.text_container {margin: 30px 0;}
	.content .vc_column-inner {padding-left: 0!important;padding-right: 30px!important;}
	.related_post.vc_col-sm-12 {padding-left: 0!important;padding-right: 0!important;} /* .related_post.vc_col-sm-12 .vc_col-sm-12 */
	.related_posts_container {margin-left: -15px;margin-right: -15px;width: calc(100% + 30px);margin-bottom: 40px;overflow: hidden;}
	.content .vc_col-lg-3 .vc_column-inner {padding-right: 0px!important;}
	.popular_post .entry-title, .related_post .entry-title {font-weight: 600;text-align: left;font-family: Lato;font-style: normal;}
	.related_post .entry-title a {color: #333!important;text-decoration: none!important;font-size: 18px;}
	.related_post .entry-meta {font-size: 14px!important;color: rgba(99,108,114,.498)!important;line-height: 19px!important;border-width: 0!important;}
	.fixed-ratio-parent {margin-bottom: 20px;}
	
    h1 {font-family: Lato;color: #FFF;}
    .single_post p.entry-title a, .single_post p.entry-title a, .single_post a.more-link, .related_post .entry-meta, h3 {font-family: Lato;}
	.single_post a.more-link, .category-posts .single_post a.more-link {text-decoration: none!important;color: #009fe1!important;}
    
</style>
<div class="blog content color color199ed8">
    <div class="container">
                <div class="content__text">
					<div class="vc_row wpb_row vc_row-fluid news-container vc_custom_1571147016480 vc_row-has-fill" style="background-image: url(/wp-content/themes/petrosoftinc/images/u1968_state0.jpg) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="wpb_text_column wpb_content_element ">
														<div class="wpb_wrapper">
                                                          <?php $category = get_category(get_query_var('cat'),false); ?>
													      <?php
                                                            if ($category->cat_ID == 1) {
                                                          ?>
                                                              <h1>Petrosoft News</h1>
                                                          <?php
                                                            }
                                                          ?>
                                                          <?php
                                                            if ($category->cat_ID == 10) {
                                                          ?>
                                                              <h1>Petrosoft Press Releases</h1>
                                                          <?php
                                                            }
                                                          ?>
                                                          <?php
                                                            if ($category->cat_ID != 10 && $category->cat_ID != 1) {
                                                          ?>
                                                              <h1>Petrosoft Blog</h1>
                                                          <?php
                                                            }
                                                          ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-9 vc_col-md-12 vc_col-xs-12 category-posts">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<?php $category = get_category(get_query_var('cat'),false); ?>
													<?php query_posts('showposts=10000&cat='.$category->cat_ID.'&orderby==date&order=DESC'); ?>
                           <?php get_template_part('template-parts/blog/blog','menu' ); ?>
													<?php while (have_posts()) : the_post(); ?>
														<div class="vc_col-sm-12 single_post">
															<div class="vc_col-sm-4">
														
                                                        <div class="necessary-width">
																	<div class="fixed-ratio-parent">
																		<div class="fixed-ratio-child">
																			<div class="fixed-ratio-content" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center center no-repeat;background-size: cover;height: 100%;"></div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="vc_col-sm-8">
																<div class="entry-meta">
																	<!--<span class="time"><?php get_the_date('M d, Y G:i a'); ?></span>-->
                                                                    <span class="time"><?php echo get_the_date('M d, Y G:i a'); ?></span>													
																	<!--<div class="category">
																		<?php
																			$category = get_the_category(); 
																			foreach ($category as $item) { echo $item->cat_name. " "; }
																		?>	
																	</div>-->
																</div>
																<p class="entry-title"><a href="<?php the_permalink() ?>" class="bookmark"><?php the_title(); ?></a></p>
																<?php the_content("Continue reading »"); ?>
															</div>
														</div>	
													<?php endwhile; ?>
												</div>
											</div>
										</div>
										
										
										
										<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-3 vc_col-md-12 vc_col-xs-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="vc_col-sm-12 related_posts_title"><h3>Categories</h3></div>
													<?php $category = get_category(get_query_var('cat'),false); ?>
													<?php
                                                        if ($category->cat_ID == 18 || $category->parent == 18) {
                                                          $args = array(
															'parent'                   => 18,
															'hide_empty'               => 0,
                                                            'child_of'     			   => 0,
															'exclude'                  => '',
															'number'                   => '0',
															'taxonomy'                 => 'category',
															'pad_counts'               => true );
                                                        } else {
                                                          $args = array(
															'parent'                   => 0,
															'hide_empty'               => 0,
                                                            'child_of'     			   => 0,
															'exclude'                  => '',
															'number'                   => '0',
															'taxonomy'                 => 'category',
															'pad_counts'               => true );
                                                        }
														$catlist = get_categories($args);
														//print_r($catlist);
													?>
													<ul class="list_categories right_col">
														<?php
															foreach ($catlist as $categories_item) {
																$class = '';
																if ($category->cat_ID == $categories_item->cat_ID) { $class = 'selected'; }
																echo '<li class="'.$class.'" data-catid="'.$category->cat_ID.'" data-current-catid="'.$categories_item->cat_ID.'"><a href="'.get_category_link($categories_item->cat_ID).'"><span>'.$categories_item->cat_name.'</span></a></li>';
															}
														?>
													</ul>
													<div class="clear"></div>
													<div class="vc_col-sm-12 related_posts_title"><h3>Popular Posts</h3></div>
													<?php query_posts('showposts=4&orderby=rand'); ?>
													<?php while (have_posts()) : the_post(); ?>
														<div class="vc_col-sm-12 popular_post">
															<div class="vc_col-sm-4">
																<div class="thumbnail_post">
																	<div class="necessary-width">
																		<div class="fixed-ratio-parent" style="padding-top: 59.25%;">
																			<div class="fixed-ratio-child">
																				<div class="fixed-ratio-content" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center center no-repeat;background-size: cover;height: 100%;"></div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="vc_col-sm-8">
																<div class="entry-meta"><?php get_the_date('M d, Y G:i a'); ?></div>
																<p class="entry-title"><a href="<?php the_permalink() ?>" class="bookmark"><?php the_title(); ?></a></p>
															</div>
														</div>
													<?php endwhile; ?>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<h3>Related Articles</h3>
										<div class="related_posts_container">
											<?php query_posts('showposts=4&orderby=rand'); ?>
											<?php while (have_posts()) : the_post(); ?>
											<div class="related_post vc_col-sm-12 vc_col-lg-3 vc_col-md-6 vc_col-xs-12">
												<div class="vc_col-sm-12">
													<div class="thumbnail_post">
														<div class="necessary-width">
															<div class="fixed-ratio-parent" style="padding-top: 59.25%;">
																<div class="fixed-ratio-child">
																	<div class="fixed-ratio-content" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center center no-repeat;background-size: cover;height: 100%;"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="vc_col-sm-12">
													<div class="entry-meta"><?php echo get_the_date('M d, Y G:i a'); ?></div>
													<p class="entry-title"><a href="<?php the_permalink() ?>" class="bookmark"><?php the_title(); ?></a></p>
												</div>
											</div>
											<?php endwhile; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
    </div>
</div>
<?php get_footer(); ?>