<?php

//Template Name: Strategy

get_header(); ?>

<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

	<div class="default-page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
				    $enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
				    if(!$enable_vc ) {
				    ?>
				    <header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '.</h1>' ); ?>
					</header><!-- .entry-header -->
				    <?php } ?>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<section id="primary" class="content-area col-sm-12 col-lg-12">
						<main id="main" class="site-main" role="main">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content">
									<?php
										the_content();
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
								<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
									<footer class="entry-footer">
										<?php
											edit_post_link(
												sprintf(
													/* translators: %s: Name of current post */
													esc_html__( 'Edit %s', 'wp-bootstrap-starter' ),
													the_title( '<span class="screen-reader-text">"', '"</span>', false )
												),
												'<span class="edit-link">',
												'</span>'
											);
										?>
									</footer><!-- .entry-footer -->
								<?php endif; ?>
							</article><!-- #post-## -->
						</main><!-- #main -->
					</section><!-- #primary -->
					<?php //get_sidebar(); ?>
				</div>
			</div>
			<div class="core-features">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php

							$feature_title = get_field('cs_strategy_title');
							$core_features = get_field('cs_strategy_core_features');

							?>
							<?php if($feature_title) : ?>

							<h2 class="entry-title"><?php echo $feature_title; ?></h2>

							<?php endif; ?>
							
							<?php if($core_features) : ?>

							<div class="list">
								<?php foreach($core_features as $cf) : ?>

								<div class="row">
									<div class="col-md-3 p-0">
										<div class="content-wrapper">
											<h4><?php echo $cf['cs_strategy_core_features_title']; ?></h4>
										</div>
									</div>
									<div class="col-md-9 p-0">
										<div class="content-wrapper">
											<?php echo apply_filters('the_content',$cf['cs_strategy_core_features_description']); ?>
										</div>
									</div>
								</div>

								<?php endforeach; ?>
							</div>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	<?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
