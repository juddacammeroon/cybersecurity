<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */
get_header(); ?>
	<div class="default-page-wrapper">
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<section id="primary" class="content-area col-sm-12 col-lg-8">
						<main id="main" class="site-main" role="main">
						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', get_post_format() );
							    //the_post_navigation();
							 ?>
							
							<?php if (has_category('news')) : ?>
								<a href="<?php echo home_url(); ?>/category/news/" class="cs-button"><i class="fas fa-arrow-left"></i> Back to News List</a>
							<?php elseif (has_category('article')) : ?>
								<a href="<?php echo home_url(); ?>/category/article/" class="cs-button"><i class="fas fa-arrow-left"></i> Back to Articles List</a>
							<?php elseif (has_category('security-tips')) : ?>
								<a href="<?php echo home_url(); ?>/category/security-tips/" class="cs-button"><i class="fas fa-arrow-left"></i> Back to Security Tips List</a>
							<?php endif; ?>
							
							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								//comments_template();
							endif;
						endwhile; // End of the loop.
						?>
						</main><!-- #main -->
					</section><!-- #primary -->
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
