<?php

//Template Name: Model

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
						<div class="graph-description">
							<p>
								The cyber security model gives measurements which are recognised by the cyber security capability maturity model of the global cyber security capacity centre, University of Oxford.
							</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="pie-graph">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-graph.png" class="float-right" />
						</div>
						<div class="graph float-right force-hide">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-legislation.png" class="model legislation">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-risk-management.png" class="model risk-management">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-culture.png" class="model culture">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-education.png" class="model education">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-policy.png" class="model policy">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-civil-society.png" class="model civil-society">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-public-sector.png" class="model public-sector">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/model-private-sector.png" class="model private-sector">
						</div>
					</div>
					<div class="col-md-6">
						<ul class="model-legend legend1">
							<li class="legend policy">Policy</li>
							<li class="legend legislation">Legislation</li>
							<li class="legend risk-management">Risk Management</li>
							<li class="legend culture">Culture</li>
							<li class="legend education">Education</li>
						</ul>
						<ul class="model-legend legend2">
							<li class="legend civil-society">Civil Society</li>
							<li class="legend public-sector">Public Sector</li>
							<li class="legend private-sector">Private Sector</li>
						</ul>
					</div>
				</div>
				<div class="row model-content">
					<div class="col-md-20">
						<div class="content policy">
							<h4>Policy</h4>
							<p>
								Devising cyber security policy and strategy that sets the direction on a national level.
							</p>
						</div>
					</div>
					<div class="col-md-20">
						<div class="content legislation">
							<h4>Legislation</h4>
							<p>
								Creating effective legal and regulatory frameworks to support all aspects of the strategy
							</p>
						</div>
					</div>
					<div class="col-md-20">
						<div class="content risk-management">
							<h4>Risk Management</h4>
							<p>
								Controlling risks through organisation, standards, and technology.
							</p>
						</div>
					</div>
					<div class="col-md-20">
						<div class="content culture">
							<h4>Culture</h4>
							<p>
								Fostering awareness to encourage a responsible cyber culture throughout society.
							</p>
						</div>
					</div>
					<div class="col-md-20">
						<div class="content education">
							<h4>Education</h4>
							<p>
								Building cyber skills into the workforce and leadership through effective education.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>