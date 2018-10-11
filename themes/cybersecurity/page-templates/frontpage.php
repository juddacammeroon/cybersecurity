<?php
//Template Name: Front Page
get_header();
?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<div class="homepage-wrapper">
		<div class="banner">
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<?php
							
							$banner_slider = get_field('cs_home_banner_slider', get_the_ID(), TRUE);

							?>
							<?php if($banner_slider) : ?>

							<div id="banner-slider">
								<?php foreach($banner_slider as $slide) : ?>

								<div class="caption">
									<?php if($slide['caption']) : ?>
										<h2 class="wow fadeInLeft" data-wow-delay="5s"><?php echo $slide['caption']; ?></h2>
									<?php endif; ?>
									<?php if($slide['cta_button']) : ?>
										<a href="<?php echo $slide['cta_button']['button_url'] ?>" class="cs-button red wow fadeInLeft" data-wow-delay="5s" <?php echo $slide['cta_button']['open_in_new_tab'] ? 'target="_blank"' : ''; ?>><?php echo $slide['cta_button']['button_text']; ?></a>
									<?php endif; ?>
								</div>

								<?php endforeach; ?>
							</div>

							<?php endif; ?>
						</div>
						<div class="col-md-5 force-hide">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png">
						</div>
					</div>
				</div>
			</div>
			<a href="javascript:goDown();" class="go-down-button"><i class="fas fa-angle-down"></i></a>
		</div>

		<div class="news-articles">
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="section-title">
								<?php if (ICL_LANGUAGE_CODE == "mt") : ?>
									L-Aħħar Aħbarijiet u Artikli
								<?php else : ?>
									Latest News & Articles
								<?php endif; ?>
							</h2>
							<div class="buttons">
								<a href="javascript:toggleNewsArticles('news')" class="post-button" id="the-news-button"><?php echo ICL_LANGUAGE_CODE == "mt" ? "L-Aħħar Aħbarijiet" : "Latest News" ?></a>
								<a href="javascript:toggleNewsArticles('articles')" class="post-button" id="the-articles-button"><?php echo ICL_LANGUAGE_CODE == "mt" ? "Artikli Riċenti" : "Recent Articles" ?></a>
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
/*
		$security_tips_image = get_field('cs_security_tips_featured_image');
		$security_tips_title = get_field('cs_security_tips_title');
		$security_tips_subtitle = get_field('cs_security_tips_subtitle');
		$security_tips_description = get_field('cs_security_tips_description');
		$security_tips_button = get_field('cs_security_tips_read_more_button');
*/
		
		$s_tips = new WP_Query(
			array(
				'posts_per_page' => 1,
				'post_type' => 'post',
				'category_name' => 'security-tips',
				'suppress_filters' => false
			)
		);
		
		?>
		<?php //if($security_tips_image || $security_tips_title || $security_tips_subtitle || $security_tips_description || $security_tips_button) : ?>
		<?php if($s_tips->have_posts()) : ?>
		<div class="security-tips wow fadeIn" data-wow-duration="5s">
			<div class="container">
				<div class="row">
					<?php while($s_tips->have_posts()) : $s_tips->the_post(); ?>
					<?php if(has_post_thumbnail()) : ?>
						<div class="col-lg-6">
							<div class="image-holder" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>)">
							</div>
						</div>
					<?php endif; ?>
					<div class="<?php echo has_post_thumbnail() ? 'col-lg-6' : 'col-lg-12'; ?>">
						<div class="security-caption">
							<h5><?php echo ICL_LANGUAGE_CODE == "mt" ? "Pariri zghar dwar Sigurtá" : "Security Tips" ?></h5>
							<h2>
								<?php the_title(); ?>
							</h2>
							<p>
								<?php echo wp_trim_words(strip_shortcodes(wp_strip_all_tags(preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', get_the_content()))),20,'...'); ?>
							</p>

							<a href="<?php the_permalink(); ?>" class="cs-button"><?php echo ICL_LANGUAGE_CODE == "mt" ? "Aqrá iżjed" : "Learn More" ?></a>
						</div>
					</div>
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php
		
		$testimonials = new WP_Query(
			array(
				'posts_per_page' => -1,
				'post_type' => 'testimonial',
				'suppress_filters' => false
			)
		);

		?>
		<pre class="force-hide">
			<?php print_r($testimonials); ?>
		</pre>
		<?php if ($testimonials->have_posts()) : ?>
		<div class="testimonials" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/testimonials-bg.png);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="section-title" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/heading-quote.png);"><?php echo ICL_LANGUAGE_CODE == "mt" ? "Testimonjanzi" : "Testimonials" ?></h2>
						<div class="testimonial-container">
							<?php while($testimonials->have_posts()) : $testimonials->the_post(); ?>
							<?php //foreach($testimonials as $testimonial) : ?>
							<div class="slide">
								<div class="testimonial-content">
									<?php echo apply_filters('the_content',get_the_content()); ?>
									<div class="boxed testimonial-author">
										<?php if(has_post_thumbnail(get_the_ID())) : ?>
										<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
										<?php endif; ?>
										<div class="info">
											<p>
												<?php echo get_the_title(); ?>
												<?php if(get_field('cs_testimonial_position',get_the_ID(),TRUE)) : ?>
												<span><?php echo get_field('cs_testimonial_position',get_the_ID(),TRUE); ?></span>
												<?php endif; ?>
											</p>
										</div>
									</div>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote.png" class="quote">
								</div>
							</div>
							<?php //endforeach; ?>
							<?php endwhile; wp_reset_query(); ?>
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