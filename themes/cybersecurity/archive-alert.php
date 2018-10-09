<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
get_header(); ?>
	<div class="default-page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header class="page-header">
						<h1 class="entry-title">Alerts And Advisories.</h1>
					</header><!-- .page-header -->
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<section id="primary" class="content-area col-sm-12 col-lg-12">
						<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) : ?>
							<div class="news-list">
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post(); ?>
									<div class="news-item alert-item">
										<div class="row">
											<div class="col-md-6">
												<?php if (has_post_thumbnail(get_the_ID())) : ?>

												<a href="<?php echo get_permalink(get_the_ID()); ?>" class="featured-image">
													<?php echo get_the_post_thumbnail(get_the_ID(),'alert-thumbnail'); ?>
												</a>

												<?php endif; ?>
											</div>
											<div class="col-md-6">
												<h2><?php the_title(); ?></h2>
												<p class="meta">
													<?php echo get_the_date(); ?>, <?php the_author(); ?>
												</p>
												<p class="excerpt">
													<?php echo wp_trim_words(wp_strip_all_tags($post->post_content),43,''); ?>
												</p>

												<a href="<?php echo get_permalink(get_the_ID()); ?>" class="cs-button">Learn More</a>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
								<center>
									<div class="news-pagination">
										<?php

										$big = 999999999; // need an unlikely integer

										echo paginate_links( array(
											'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
											'format' => '?paged=%#%',
											'current' => max( 1, get_query_var('paged') ),
											'prev_text' => __('Prev'),
											'next_text' => __('Next'),
										) );

										?>
									</div>
								</center>
								
							</div>
							
							<?php
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
						</main><!-- #main -->
					</section><!-- #primary -->
					<?php //get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php
get_footer();
