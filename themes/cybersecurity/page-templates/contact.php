<?php

//Template Name: Contact

get_header();

?>

<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

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
					<div class="col-md-7">
						<div class="contact-form">
							<?php echo do_shortcode('[contact-form-7 id="854" title="Contact form 1"]'); ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="contact-info">
							<h2>Don’t Hesitate to contact with us for any kind of information</h2>
							<p>
								Call us for imiditate support this number <a href="tel:(00356) 2123 4710">(00356) 2123 4710</a>
							</p>
							<ul class="list-inline">
								<li class="list-inline-item facebook">
									<a href="https://www.facebook.com/cybersecuremt/" target="_blank">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>
								<li class="list-inline-item twitter">
									<a href="https://twitter.com/cybersecuremt" target="_blank">
										<i class="fab fa-twitter"></i>
									</a>
								</li>
								<li class="list-inline-item instagram">
									<a href="https://www.instagram.com/cybersecuremt/" target="_blank">
										<i class="fab fa-instagram"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-map">
		<?php
		$location = get_field('cs_contact_map_location');

		if( !empty($location) ):
		?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<p class="address"><?php echo $location['address']; ?></p>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC1DcSIXPKWd9CAn4AmhCq8NmknQv0AJs"></script>
	<script type="text/javascript">
	(function($) {

	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	function new_map( $el ) {
		
		// var
		var $markers = $el.find('.marker');
		
		
		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};
		
		
		// create map	        	
		var map = new google.maps.Map( $el[0], args);
		
		
		// add a markers reference
		map.markers = [];
		
		
		// add markers
		$markers.each(function(){
			
	    	add_marker( $(this), map );
			
		});
		
		
		// center map
		center_map( map );
		
		
		// return
		return map;
		
	}

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	}

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}

	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;

	$(document).ready(function(){

		$('.acf-map').each(function(){

			// create map
			map = new_map( $(this) );

		});

	});

	})(jQuery);
	</script>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>