<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; Copyright <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?> <?php echo date('Y'); ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://www.web-design-malta.com/" target="_blank" title="Wordpress Technical Support" alt="Bootstrap Wordpress Theme"><?php echo esc_html__('All Rights Reserved','wp-bootstrap-starter'); ?></a>
                <div class="social-icons">
                    <?php dynamic_sidebar( 'social-media-icons' ); ?>
                </div>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript">
new WOW().init();
function initGreetings() {
    var thehours = new Date().getHours();
    var themessage;
    var morning = ('Good Morning');
    var afternoon = ('Good Afternoon');
    var evening = ('Good Evening');

    if (thehours >= 0 && thehours < 12) {
        themessage = morning; 

    } else if (thehours >= 12 && thehours < 17) {
        themessage = afternoon;

    } else if (thehours >= 17 && thehours < 24) {
        themessage = evening;
    }

    jQuery('.top-bar').find('.greeting').html(themessage);
}

function toggleNewsArticles(flag) {
    if (jQuery('#the-'+flag+'-button').hasClass(flag)) {

    } else {
        jQuery('#the-'+flag).slick('unslick');
        jQuery('.news-articles').find('.buttons').find('.post-button').removeClass('active');
        jQuery('.news-articles').find('.article-list').removeClass('active');
        jQuery('#the-'+flag).addClass('active');
        jQuery('#the-'+flag+'-button').addClass('active');
        jQuery('#the-'+flag).slick({
            dots: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 941,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
}

function toggleMobileMenu() {
    if (jQuery('.menu-button').hasClass('toggled')) {
        jQuery('.menu-button').removeClass('toggled');
        jQuery('#cs-custom-menu.mobile').removeClass('toggled');
        jQuery('body').removeClass('menu-toggled');
    } else {
        jQuery('.menu-button').addClass('toggled');
        jQuery('#cs-custom-menu.mobile').addClass('toggled');
        jQuery('body').addClass('menu-toggled');
    }
}
function toggleMobileSearch() {
    if (jQuery('.mobile-search').hasClass('toggled')) {
        jQuery('.mobile-search').removeClass('toggled');
        jQuery('.mobile-search-modal').removeClass('toggled');
    } else {
        jQuery('.mobile-search').addClass('toggled');
        jQuery('.mobile-search-modal').addClass('toggled');
    }
}
function addMobileClass() {
    if (jQuery(window).width() < 1025) {
        jQuery('#cs-custom-menu').addClass('mobile');
    } else {
        jQuery('#cs-custom-menu').removeClass('mobile');
    }
}
function goDown() {

    wpadminbar = 0;

    if (jQuery('#wpadminbar').length > 0) {
        wpadminbar = jQuery('#wpadminbar').outerHeight();
    }

    jQuery('html,body').animate({
        scrollTop: jQuery(window).height() - (wpadminbar + jQuery('header#masthead').outerHeight() + jQuery('.top-bar').outerHeight())
    }, 500);
}

function toggleMenuItem(id) {
    console.log(id);
    if (jQuery('#dropdown-button-'+id).hasClass('active')) {
        console.log('true');
        jQuery('#dropdown-button-'+id).removeClass('active');
        jQuery('#menu-id-'+id+' > ul.sub-menu').removeClass('active');
    } else {
        console.log('false');
        jQuery('#dropdown-button-'+id).addClass('active');
        jQuery('#menu-id-'+id+' > ul.sub-menu').addClass('active');
    }
    
}

function addArrowsOnMobileMenu() {
    if (jQuery('#cs-custom-menu').hasClass('mobile')) {
        jQuery('#cs-custom-menu').find('.menu-class-name').find('li.menu-item').each(function(){
            var id = jQuery(this).attr('id');
            id = id.replace('menu-id-','');
            if (jQuery(this).hasClass('menu-item-has-children')) {
                if (jQuery(this).find('.dropdown-menu-button').length > 0) {

                } else {
                    jQuery(this).append(jQuery('<a href="javascript:toggleMenuItem(\''+id+'\');" class="dropdown-menu-button" id="dropdown-button-'+id+'"><i class="fas fa-angle-down"></i></a>'));
                }
            }
        });
    } else {
        jQuery('#cs-custom-menu').find('.dropdown-menu-button').each(function(){
            jQuery(this).remove();
        });
    }
}

jQuery(document).ready(function(){
    initGreetings();
    addMobileClass();
    addArrowsOnMobileMenu();
    jQuery('.homepage-wrapper').find('.banner').height(jQuery(window).height());
    if (jQuery('.article-list').length > 0) {
        jQuery('.article-list.slider').slick({
            dots: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    }
    if (jQuery('.testimonial-container').length > 0) {
        jQuery('.testimonial-container').slick({
            dots: true,
            arrows: false,
			autoplay: true,
			autoplaySpeed: 5000,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 941,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    if (jQuery('.media-kit-slider').length > 0) {
        jQuery('.media-kit-slider').slick({
            dots: false,
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 941,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    if (jQuery('.press-releases-slider').length > 0) {
        jQuery('.press-releases-slider').slick({
            dots: false,
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 941,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    toggleNewsArticles('news');
});
jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() > (jQuery('header#masthead').outerHeight() + jQuery('.top-bar').outerHeight())) {
        jQuery('body').addClass('scrolled');
    } else {
        jQuery('body').removeClass('scrolled');
    }
});
jQuery(window).resize(function(){
    addMobileClass();
    addArrowsOnMobileMenu();
    jQuery('.homepage-wrapper').find('.banner').height(jQuery(window).height());
});

</script>
</body>
</html>