<?php

//Template Name: News

get_header();

?>

<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

	<div class="default-page-wrapper news-page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="entry-title"><?php the_title(); ?>.</h1>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8">
						<div class="news-list">
							<?php

							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

							$news_args = array(
								'posts_per_page' => 5,
								'post_type' => 'post',
								'paged' => $paged
							);

							$news = new WP_Query($news_args);
							global $post;
							?>

							<?php if ($news->have_posts()) : ?>

								<?php while($news->have_posts()) : $news->the_post(); ?>
									<div class="news-item">
										<?php if (has_post_thumbnail(get_the_ID())) : ?>

										<a href="<?php echo get_permalink(get_the_ID()); ?>" class="featured-image">
											<?php echo get_the_post_thumbnail(get_the_ID(),'custom-blog-thumbnail'); ?>
										</a>

										<?php endif; ?>

										<p class="meta">
											<?php echo get_the_date(); ?>
										</p>

										<h2><?php the_title(); ?></h2>
										
										<p class="excerpt">
											<?php echo wp_trim_words(wp_strip_all_tags($post->post_content),43,''); ?>
										</p>

										<a href="<?php echo get_permalink(get_the_ID()); ?>" class="read-more">Read More &rarr;</a>
									</div>
								<?php endwhile; ?>

								<div class="news-pagination">
									<?php

									$big = 999999999; // need an unlikely integer

									echo paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $news->max_num_pages,
										'prev_text' => __('Prev'),
										'next_text' => __('Next'),
									) );

									wp_reset_query();

									?>
								</div>
								
							<?php endif; ?>
							
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>