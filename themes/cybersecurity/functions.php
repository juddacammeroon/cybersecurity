<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
    	/* From Parent Theme */
    	wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'wp-bootstrap-starter-bootstrap-css' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
function custom_scripts() {
	/* Slick */
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/slick/slick.css', array( ) );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/slick/slick-theme.css', array( ) );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery') );
    /* Custom Script */
    //wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'),'',1.0 );
    /* Custom WooCommerce CSS */
    wp_enqueue_style( 'woocommerce-css', get_stylesheet_directory_uri() . '/woocommerce.css', array( ) );
}
add_action('wp_enqueue_scripts','custom_scripts',10);
// END ENQUEUE PARENT ACTION


function cybersecurity_widgets() {
    unregister_sidebar( 'sidebar-1' );
    unregister_sidebar( 'footer-1' );
    unregister_sidebar( 'footer-2' );
    unregister_sidebar( 'footer-3' );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-starter' ),
        'id'            => 'cyber-security-sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
        'id'            => 'cyber-security-footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
        'id'            => 'cyber-security-footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
        'id'            => 'cyber-security-footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'wp-bootstrap-starter' ),
        'id'            => 'cyber-security-footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 5', 'wp-bootstrap-starter' ),
        'id'            => 'cyber-security-footer-5',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Social Media Icons', 'wp-bootstrap-starter' ),
        'id'            => 'social-media-icons',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'cybersecurity_widgets', 11 );

if(!class_exists('SocialMediaWidget')) {
  class SocialMediaWidget extends WP_Widget {
    /**
    * Sets up the widgets name etc
    */
    public function __construct() {
      $widget_ops = array(
        'classname' => 'social_media_widget',
        'description' => 'Social Media Page Links',
      );
      parent::__construct( 'social_media_widget', 'Social Media Widget', $widget_ops );
    }
    /**
    * Outputs the content of the widget
    *
    * @param array $args
    * @param array $instance
    */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        $widget_id = 'widget_' . $args['widget_id'];
        ob_start();
        echo $args['before_widget'];
        $title = get_field('cs_widget_title', $widget_id, TRUE);
        $facebook = get_field('cs_facebook', $widget_id, TRUE);
        $twitter = get_field('cs_twitter', $widget_id, TRUE);
		$instagram = get_field('cs_instagram', $widget_id, TRUE);
        $google_plus = get_field('cs_google_plus', $widget_id, TRUE);
        $vimeo = get_field('cs_vimeo', $widget_id, TRUE);
        ?>
        <?php if($title) : ?>
            <h3 class="widget-title"><?php echo get_field('cs_widget_title', $widget_id, TRUE); ?></h3>
        <?php endif; ?>
        <div class="social-media-wrapper">
            <ul class="list-inline">
                <?php if($facebook) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo $facebook; ?>" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <?php endif; ?>
                <?php if($twitter) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo $twitter; ?>" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
				<?php endif; ?>
				<?php if($instagram) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo $instagram; ?>" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <?php endif; ?>
                <?php if($google_plus) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo $google_plus; ?>" target="_blank">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </li>
                <?php endif; ?>
                <?php if($vimeo) : ?>
                <li class="list-inline-item">
                    <a href="<?php echo $vimeo; ?>" target="_blank">
                        <i class="fab fa-vimeo-v"></i>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php
        echo $args['after_widget'];
        echo ob_get_clean();
    }
    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }
    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
  }
}

if(!class_exists('PostsByCategory')) {
  class PostsByCategory extends WP_Widget {
    /**
    * Sets up the widgets name etc
    */
    public function __construct() {
      $widget_ops = array(
        'classname' => 'posts_by_category',
        'description' => 'Display Posts by Category',
      );
      parent::__construct( 'posts_by_category', 'Posts by Category', $widget_ops );
    }
    /**
    * Outputs the content of the widget
    *
    * @param array $args
    * @param array $instance
    */
    public function widget( $args, $instance ) {
      // outputs the content of the widget
        // outputs the content of the widget
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        $widget_id = 'widget_' . $args['widget_id'];

        ob_start();
        echo $args['before_widget'];
        $title = get_field('cs_widget_pbc_title', $widget_id, TRUE);

        $widget_articles = get_posts(
        	array(
        		'posts_per_page' => 3,
        		'post_type' => 'post',
        		'category' => get_field('cs_widget_pbc_category', $widget_id, TRUE)
        	)
        );

        ?>
        <?php if($title) : ?>
            <h3 class="widget-title"><?php echo $title; ?></h3>
        <?php endif; ?>

        <ul class="nav flex-column">
        	<?php foreach($widget_articles as $wa) : ?>

        	<li class="nav-item">
				<a href="<?php echo get_permalink($wa->ID); ?>" class="nav-link"><?php echo $wa->post_title; ?></a>
				<span class="post-date"><?php echo date('F d, Y', strtotime($wa->post_date)); ?></span>
			</li>

        	<?php endforeach; ?>
		</ul>

        <?php
        echo $args['after_widget'];
        echo ob_get_clean();
    }
    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }
    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
  }
}
/**
 * Register our CTA Widget
 */
function register_social_media_widget()
{
	register_widget( 'PostsByCategory' );
  register_widget( 'SocialMediaWidget' );
}
add_action( 'widgets_init', 'register_social_media_widget', 12 );

add_image_size( 'custom-blog-thumbnail', 772, 320, true );
add_image_size( 'alert-thumbnail', 560, 380, true );

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCC1DcSIXPKWd9CAn4AmhCq8NmknQv0AJs');
}
add_action('acf/init', 'my_acf_init');

add_shortcode('cs_email', 'cs_email_function');

function cs_email_function( $atts ) {
    $atts = shortcode_atts( array(
        'email_address' => '#',
    ), $atts, 'cs_email' );

    ob_start();

    ?>

    <a href="mailto:<?php echo $atts['email_address'] ?>" class="committee-email-address"><i class="far fa-envelope"></i> Email</a>

    <?php

    return ob_get_clean();
}

function my_li_id_handler ($id, $item, $args) {
 //the $item variable is a WP_Post instance...handy properties are $item->post_title, $item->post_name and $item->menu_order
 //do your id nomenclature work here.

 return 'menu-id-'.$item->ID;
}
add_filter('nav_menu_item_id','my_li_id_handler', 10, 3);

add_filter( 'gform_pre_render_1', 'populate_posts' );
add_filter( 'gform_pre_validation_1', 'populate_posts' );
add_filter( 'gform_pre_submission_filter_1', 'populate_posts' );
add_filter( 'gform_admin_pre_render_1', 'populate_posts' );
function populate_posts( $form ) {
 
    foreach ( $form['fields'] as &$field ) {
 
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-events' ) === false ) {
            continue;
        }
 
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: http://codex.wordpress.org/Template_Tags/get_posts
        $posts = get_posts(
        	array(
        		'posts_per_page' => -1,
        		'post_type' => 'event'
        	)
        );
 
        $choices = array();
 
        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        }
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select an Event';
        $field->choices = $choices;
 
    }
 
    return $form;
}