<?php

//Template Name: Events

get_header();

$today = current_time('Ymd');
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$type = $_GET['type'];

if (isset($type)) {
	if ($type == 'past_events') {
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'event',
			'paged' => $paged,
			'meta_query' => array(
				array(
					'key' => 'cs_event_end_date',
					'value' => $today,
					'compare' => '<',
					'type' => 'DATE'
				)
			),
			'meta_key' => 'cs_event_start_date',
			'order_by' => 'meta_value',
			'order' => 'DESC',
		);
	} else if ($type == 'ongoing_events') {
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'event',
			'paged' => $paged,
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'cs_event_start_date',
					'value' => $today,
					'compare' => '<=',
					'type' => 'DATE'
				),
				array(
					'key' => 'cs_event_end_date',
					'value' => $today,
					'compare' => '>=',
					'type' => 'DATE'
				)
			),
			'meta_key' => 'cs_event_start_date',
			'order_by' => 'meta_value',
			'order' => 'ASC',
		);
	} else {
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'event',
			'paged' => $paged,
			'meta_query' => array(
				array(
					'key' => 'cs_event_start_date',
					'value' => $today,
					'compare' => '>',
					'type' => 'DATE'
				)
			),
			'meta_key' => 'cs_event_start_date',
			'order_by' => 'meta_value',
			'order' => 'ASC',
		);
	}
} else {
	$args = array(
		'posts_per_page' => 6,
		'post_type' => 'event',
		'paged' => $paged,
		'meta_query' => array(
			array(
				'key' => 'cs_event_start_date',
				'value' => $today,
				'compare' => '>',
				'type' => 'DATE'
			)
		),
		'meta_key' => 'cs_event_start_date',
		'order_by' => 'meta_value',
		'order' => 'ASC',
	);
}

?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

	<div class="default-page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (ICL_LANGUAGE_CODE == "mt") : ?>
						<h1 class="entry-title"><?php echo $type == 'past_events' ? 'Avvenimenti Passati' : ($type == 'ongoing_events' ? 'Avvenimenti Kurrenti' : 'Avvenimenti Futuri'); ?></h1>
					<?php else : ?>
						<h1 class="entry-title"><?php echo $type == 'past_events' ? 'Past Events' : ($type == 'ongoing_events' ? 'Ongoing Events' : 'Upcoming Events'); ?></h1>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<section id="primary" class="col-md-12">
						<?php

						query_posts($args);

						if ( have_posts() ) : ?>
							<div class="article-list-wrapper">
								<div class="row">
									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										<div class="col-md-4">
											<div class="article-excerpt">
												<?php if (has_post_thumbnail(get_the_ID())) : ?>
													<div class="featured-image" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>)"></div>
												<?php endif; ?>
												<p class="meta">
													<?php echo date('d M, Y', strtotime(get_the_date())); ?>
												</p>
												<h4>
													<a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
												</h4>
												<p class="excerpt">
													<?php echo wp_trim_words(strip_shortcodes(wp_strip_all_tags(get_the_content())),18,''); ?>
												</p>
												<a href="<?php echo get_permalink(get_the_ID()); ?>" class="read-more">Read More &rarr;</a>
											</div>
										</div>
									<?php endwhile; ?>
									<div class="col-md-12">
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
								</div>
							</div>
							<?php

							wp_reset_query();

						else :
							get_template_part( 'template-parts/content', 'none' );
						endif; ?>
					</section><!-- #primary -->
					<?php //get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>