<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */
get_header(); ?>
<div class="default-page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<header class="page-header">
					<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<section id="primary" class="content-area col-sm-12 col-lg-8">
					<main id="main" class="site-main" role="main">
					<?php
					if ( have_posts() ) : ?>
						<div class="news-list">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); ?>
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
							global $post;

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $post->max_num_pages,
								'prev_text' => __('Prev'),
								'next_text' => __('Next'),
							) );

							?>
						</div>

						<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
						</div>
					</main><!-- #main -->
				</section><!-- #primary -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	
</div>
<?php
get_footer();
