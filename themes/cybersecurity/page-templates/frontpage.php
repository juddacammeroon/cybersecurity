<?php
//Template Name: Front Page
get_header();
?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<div class="homepage-wrapper">
		<?php

		$banner_title = get_field('cs_home_banner_caption_title');
		$banner_subtitle = get_field('cs_home_banner_caption_subtitle');
		$banner_button = get_field('cs_home_banner_cta_button');

		?>
		<?php if($banner_title || $banner_subtitle || $banner_button) : ?>
		<div class="banner">
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-9">
							<div class="caption">
								<?php if($banner_title) : ?>
									<h2 class="wow fadeInLeft" data-wow-delay="5s"><?php echo $banner_title; ?></h2>
								<?php endif; ?>
								<?php if($banner_subtitle) : ?>
									<p class="wow fadeInLeft" data-wow-delay="0.25s">
										<?php echo $banner_subtitle; ?>
									</p>
								<?php endif; ?>
								<?php if($banner_button) : ?>
									<a href="<?php echo $banner_button['button_url'] ?>" class="cs-button red wow fadeInLeft" data-wow-delay="5s" <?php echo $banner_button['open_in_new_tab'] ? 'target="_blank"' : ''; ?>><?php echo $banner_button['button_text']; ?></a>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-5 force-hide">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png">
						</div>
					</div>
				</div>
			</div>
			<a href="javascript:goDown();" class="go-down-button"><i class="fas fa-angle-down"></i></a>
		</div>
		<?php endif; ?>

		<div class="news-articles">
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="section-title">Latest News & Articles</h2>
							<div class="buttons">
								<a href="javascript:toggleNewsArticles('news')" class="post-button" id="the-news-button">Latest News</a>
								<a href="javascript:toggleNewsArticles('articles')" class="post-button" id="the-articles-button">Recent Articles</a>
							</div>
							<div class="article-list slider" id="the-articles">
								<?php

								$articles_args = array(
									'posts_per_page' => 9,
									'post_type' => 'post',
									'category_name' => 'article'
								);

								$articles_posts = get_posts($articles_args);

								?>

								<?php foreach($articles_posts as $ap) : ?>

								<div class="article-excerpt">
									<?php if (has_post_thumbnail($ap->ID)) : ?>
										<div class="featured-image" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($ap->ID)); ?>)"></div>
									<?php endif; ?>
									<p class="meta">
										<?php echo date('d M, Y', strtotime($ap->post_date)); ?>
									</p>
									<h4>
										<a href="<?php echo get_permalink($ap->ID); ?>"><?php echo $ap->post_title; ?></a>
									</h4>
									<p class="excerpt">
										<?php echo wp_trim_words(strip_shortcodes(wp_strip_all_tags($ap->post_content)),18,''); ?>
									</p>
									<a href="<?php echo get_permalink($ap->ID); ?>" class="read-more">Read More &rarr;</a>
								</div>

								<?php endforeach; ?>
							</div>
							<div class="article-list slider" id="the-news">
								<?php

								$news_args = array(
									'posts_per_page' => 9,
									'post_type' => 'post',
									'category_name' => 'news'
								);

								$news_posts = get_posts($news_args);

								?>

								<?php foreach($news_posts as $np) : ?>

								<div class="article-excerpt">
									<?php if (has_post_thumbnail($np->ID)) : ?>
										<div class="featured-image" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($np->ID)); ?>)"></div>
									<?php endif; ?>
									<p class="meta">
										<?php echo date('d M, Y', strtotime($np->post_date)); ?>
									</p>
									<h4>
										<a href="<?php echo get_permalink($np->ID); ?>"><?php echo $np->post_title; ?></a>
									</h4>
									<p class="excerpt">
										<?php echo wp_trim_words(strip_shortcodes(wp_strip_all_tags($np->post_content)),18,''); ?>
									</p>
									<a href="<?php echo get_permalink($np->ID); ?>" class="read-more">Read More &rarr;</a>
								</div>

								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breaker"></div>
				</div>
			</div>
		</div>
		<?php

		$security_tips_image = get_field('cs_security_tips_featured_image');
		$security_tips_title = get_field('cs_security_tips_title');
		$security_tips_subtitle = get_field('cs_security_tips_subtitle');
		$security_tips_description = get_field('cs_security_tips_description');
		$security_tips_button = get_field('cs_security_tips_read_more_button');

		?>
		<?php if($security_tips_image || $security_tips_title || $security_tips_subtitle || $security_tips_description || $security_tips_button) : ?>
		<div class="security-tips wow fadeIn" data-wow-duration="5s">
			<div class="container">
				<div class="row">
					<?php if($security_tips_image) : ?>
						<div class="col-lg-6">
							<img src="<?php echo $security_tips_image; ?>">
						</div>
					<?php endif; ?>
					<div class="<?php echo $security_tips_image ? 'col-lg-6' : 'col-lg-12'; ?>">
						<div class="security-caption">
							<h5>Security Tips</h5>

							<?php if($security_tips_title) : ?>
							<h2>
								<?php echo $security_tips_title; ?>
							</h2>
							<?php endif; ?>

							<?php if($security_tips_subtitle) : ?>
							<h4>
								 <?php echo $security_tips_subtitle; ?>
							</h4>
							<?php endif; ?>

							<?php if($security_tips_description) : ?>
								<?php echo apply_filters('the_content',$security_tips_description); ?>
							<?php endif; ?>

							<?php if($security_tips_button) : ?>
								<a href="<?php echo $security_tips_button['button_url']; ?>" class="cs-button" <?php echo $security_tips_button['open_in_new_tab'] ? 'target="_blank"' : ''; ?>><?php echo $security_tips_button['button_text']; ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php

		$testimonials = get_posts(
			array(
				'posts_per_page' => -1,
				'post_type' => 'testimonial'
			)
		);

		?>
		<?php if (count($testimonials) > 0) : ?>
		<div class="testimonials" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/testimonials-bg.png);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="section-title" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/heading-quote.png);">Testimonials</h2>
						<div class="testimonial-container">
							<?php foreach($testimonials as $testimonial) : ?>
							<div class="slide">
								<div class="testimonial-content">
									<?php echo apply_filters('the_content',$testimonial->post_content); ?>
									<div class="boxed testimonial-author">
										<?php if(has_post_thumbnail($testimonial->ID)) : ?>
										<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($testimonial->ID)); ?>">
										<?php endif; ?>
										<div class="info">
											<p>
												<?php echo $testimonial->post_title; ?>
												<?php if(get_field('cs_testimonial_position',$testimonial->ID,TRUE)) : ?>
												<span><?php echo get_field('cs_testimonial_position',$testimonial->ID,TRUE); ?></span>
												<?php endif; ?>
											</p>
										</div>
									</div>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote.png" class="quote">
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>