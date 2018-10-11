<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! is_active_sidebar( 'cyber-security-sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
	<?php if(has_category(array('news','article','security-tips'))) : ?>
		<section class="widget posts_by_category">
			
			<?php
			
			if (has_category('news')) {
				$title = 'Recent Articles';
				$category = 'article';
			} else if (has_category('article')) {
				$title = 'Latest News';
				$category = 'news';
			} else if (has_category('security-tips')) {
				$title = 'Security Tips';
				$category = 'security-tips';
			}
			
			$blog = new WP_Query(
				array(
					'posts_per_page' => 3,
					'post_type' => 'post',
					'category_name' => $category,
					'suppress_filters' => false 
				)
			);
			
			?>
			
			<?php if ($blog->have_posts()) : ?>
			
				<h3 class="widget-title"><?php echo $title; ?></h3>
				<ul class="nav flex-column">
					
				<?php while($blog->have_posts()) : $blog->the_post(); ?>
					
					<li class="nav-item">
						<a href="<?php the_permalink(); ?>" class="nav-link"><?php the_title(); ?></a>
					</li>
					
				<?php endwhile; wp_reset_query(); ?>
						
				</ul>
			<?php endif; ?>

        </section>
	<?php else : ?>
		<?php //dynamic_sidebar( 'cyber-security-sidebar-1' ); ?>
	<?php endif; ?>
</aside><!-- #secondary -->
