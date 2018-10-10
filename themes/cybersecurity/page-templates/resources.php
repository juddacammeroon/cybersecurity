<?php

//Template Name: Resources

get_header();

?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

	<div class="default-page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="press-releases">
							<h2><?php echo ICL_LANGUAGE_CODE == "mt" ? 'Stqarrijiet għall-Istampa' : 'Press Releases' ; ?></h2>
							<div class="press-releases-slider">
								<?php

								$args = array(
									'posts_per_page' => -1,
									'post_type' => 'resource_articles',
									'tax_query' => array(
										array(
											'taxonomy' => 'resource_category',
											'field' => 'slug',
											'terms' => 'press-release'
										)
									)
								);

								query_posts($args);

								?>

								<?php if(have_posts()) : ?>
									<?php while(have_posts()) : the_post(); ?>

									<div class="slide">
										<div class="list-wrapper">
											<?php

											if(has_post_thumbnail()) {
												echo get_the_post_thumbnail(get_the_ID(),'alert-thumbnail');
											}

											?>
											<p class="meta">
												<?php echo date('d M, Y',strtotime(get_the_date())); ?>
											</p>
											<h4>
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h4>
											<p>
												<?php echo wp_trim_words(strip_shortcodes(wp_strip_all_tags(get_the_content())),20,''); ?>
											</p>
											<a href="<?php the_permalink(); ?>" class="read-more">Read More &rarr;</a>
										</div>
									</div>

									<?php endwhile; wp_reset_query(); ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="media-kit">
							<h2><?php echo ICL_LANGUAGE_CODE == "mt" ? 'Għodda għall-Istampa' : 'Media Kit' ; ?></h2>
							<div class="media-kit-slider">
								<?php
								
								$mk_args = array(
									'posts_per_page' => -1,
									'post_type' => 'resource_articles',
									'tax_query' => array(
										array(
											'taxonomy' => 'resource_category',
											'field' => 'slug',
											'terms' => 'media-kit'
										)
									)
								);
								
								$media_kit = get_posts($mk_args);
								
								?>
								<?php if(count($media_kit) > 0) : ?>
								
									<?php foreach($media_kit as $mk) : ?>
								
									<div class="slide">
										<div class="list-wrapper">
											<?php if(has_post_thumbnail($mk->ID)) : ?>
											<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($mk->ID)); ?>">
											<?php endif; ?>
											<h4><?php echo $mk->post_title; ?></h4>
											<p>
												<?php echo wp_trim_words(strip_shortcodes(wp_strip_all_tags($mk->post_content)),20,''); ?>
											</p>
											<?php $dlc = get_field('cs_resources_downloadable_content',$mk->ID,TRUE); ?>
											<?php if($dlc) : ?>
												<a href="<?php echo $dlc; ?>" class="download-button" target="_blank">Download <i class="far fa-arrow-alt-circle-down"></i></a>
											<?php endif; ?>
										</div>
									</div>
								
									<?php endforeach; ?>
								
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="strategy-download">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="boxed strategy-section">
								<div class="caption float-left">
									<h2><?php echo ICL_LANGUAGE_CODE == "mt" ? 'Niżżel kopja tal-Istrateġija' : 'Strategy Download' ; ?></h2>
								</div>
								<a href="#" class="float-right cs-button download-pdf-button"><i class="far fa-file-pdf"></i> Download PDF</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>