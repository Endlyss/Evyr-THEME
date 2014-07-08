<?php

/*----------------------------------
--Bring in the Theme Options Panel--
----------------------------------*/
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('#example_showhidden').click(function() {
        jQuery('#section-example_text_hidden').fadeToggle(400);
    });

    if (jQuery('#example_showhidden:checked').val() !== undefined) {
        jQuery('#section-example_text_hidden').show();
    }

});
</script>
<?php }

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
}
/*--------------
--Misc Support--
--------------*/


add_action('after_setup_theme', 'evyr2014_setup');
function evyr2014_setup()
{
    load_theme_textdomain('evyr2014', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    /*--------------------------------
    --Wordpress Header Image Feature--
    --------------------------------*/
    $args = array(
        'default-image' => get_template_directory_uri() . '/assets/img/main-logo.png',
        'random-default'         => false,
        'width'                  => 250,
        'height'                 => 90,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => false,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( "custom-background" );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support( 'automatic-feed-links' );
    add_editor_style();
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    /*------------------------
    --Register the Nav Menus--
    ------------------------*/
    register_nav_menus(
    array( 
        'main-menu' => __( 'Main Menu', 'evyr2014' ) )
    );
    register_nav_menus(
    array( 
        'top-navi' => __( 'Top Navigation', 'evyr2014' ) )
    );
}
/*--------------------
--Enqueue the styles--
--------------------*/
/*---------------------
--Enqueue the Scripts--
---------------------*/
add_action('wp_enqueue_scripts', 'evyr2014_load_scripts');
function evyr2014_load_scripts()
{
    wp_enqueue_style( 'Reset', get_template_directory_uri() . '/assets/css/reset.css');
    wp_enqueue_style( 'Lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,700');

    wp_enqueue_style( 'default', get_stylesheet_uri() );
    wp_enqueue_style( 'shortcodes' , get_template_directory_uri() . '/assets/css/shortcodes.css' );
    wp_enqueue_style( 'UserDefined', get_template_directory_uri() . '/assets/css/user-based.php' );

    /*------------------
    --Load the Scripts--
    ------------------*/
    wp_enqueue_script('jquery');
    /*---------
    --Plugins--
    ---------*/
    wp_enqueue_script( 'Easing', get_template_directory_uri() . '/assets/js/plugins/jquery.easing.1.3.js', array(), '1.0.0', true );
    wp_enqueue_script( 'FitVid', get_template_directory_uri() . '/assets/js/plugins/jquery.fitvids.js', array(), '1.0.0', true );
    /*-------------
    --BXSlider--
    -------------*/
    wp_enqueue_script( 'BX Slider', get_template_directory_uri() . '/assets/js/bxslider/jquery.bxslider.min.js', array(), '1.0.0', true );
    /*----------------------------------------
    --Main JS File that initiates all needed--
    ----------------------------------------*/
    wp_enqueue_script( 'MainJS', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
    /*-----------------
    --Load in effects--
    -----------------*/
    if(of_get_option('evyr_loadin_effects_checkbox')==1){
        wp_enqueue_script( 'Load In Effects', get_template_directory_uri() . '/assets/js/fadein.js', array(), '1.0.0', true );
    }
}
/*------------------------
--Add post count ability--
------------------------*/
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
 
// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
 
// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views', 'Evyr2014');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
/*-End Post View counter-*/

/*-------------------------------------------------------
--Defaults included in the barebones "BlankSlate" theme--
-------------------------------------------------------*/
/*----------
--Comments--
----------*/
add_action('comment_form_before', 'evyr2014_enqueue_comment_reply_script');
function evyr2014_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
/*---------------
--"the_title()"--
---------------*/
add_filter('the_title', 'evyr2014_title');
function evyr2014_title($title) {
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}
/*------------
--wp_title()--
------------*/
add_filter('wp_title', 'evyr2014_filter_wp_title');
function evyr2014_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}
/*----------------------
--Sidebar Registration--
----------------------*/
add_action('widgets_init', 'evyr2014_widgets_init');
function evyr2014_widgets_init()
{
    /*-------------------------
    --Primary Default Sidebar--
    -------------------------*/
    register_sidebar( array (
        'name' => __('Sidebar Widget Area', 'evyr2014'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) 
    );
    /*---------------------
    --Footer Sidebar area--
    ---------------------*/
    register_sidebar( array (
        'name' => __('Footer', 'evyr2014'),
        'id' => 'lower-footer-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) 
    );
}
/*-----------------------------
--Shortcodes-------------------
-----------------------------*/

    if( !function_exists('wpex_fix_shortcodes') ) {
        function wpex_fix_shortcodes($content){   
            $array = array (
                '<p>[' => '[', 
                ']</p>' => ']', 
                ']<br />' => ']'
            );
            $content = strtr($content, $array);
            return $content;
        }
        add_filter('the_content', 'wpex_fix_shortcodes');
    }
    /*-------------------------------
    ----[divider color="colorcode"]--
    -------------------------------*/
    function divider_shortcode_func( $atts ) {
        extract( shortcode_atts( array(
            'color' => 'rgba(119,119,119,0.5)'
        ), $atts ) );

        $divider = "<span class='divider-sc' style='background-color: " . $color . "'></span>";
        return $divider;

    }
    add_shortcode( 'divider', 'divider_shortcode_func' );
    /*-------
    --[row]--
    -------*/
    function evyr_row_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'class' => '',
            'id' => '',
        ), $atts ) );
        return '<div class="evyr_row ' . $class . '" id="' . $id . '">' . do_shortcode($content) . '</div>';
    }
    add_shortcode( 'evyr_row', 'evyr_row_shortcode' );
    /*--------------------------
    --[col width="grid_width"]--
    --------------------------*/
    function evyr_grid_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'class' => '',
            'width' => '12'
        ), $atts ) );
        return '<div class="evyr_grid evyr_grid_' . $width . ' ' . $class . '">' . $content . '</div>';
    }
    add_shortcode( 'evyr_grid', 'evyr_grid_shortcode' );
/*-------
--Pings--
-------*/
function evyr2014_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
    ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php 
}
/*----------------
--Count Comments--
----------------*/
add_filter('get_comments_number', 'evyr2014_comments_number');
function evyr2014_comments_number($count)
{
    if (!is_admin()) {
        global $id;
        $comments_by_type_var = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $comments_by_type_var );
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
/*-----------------------
--Custom Excerpt Length--
-----------------------*/
function excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).'...';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}

function content($limit) {
 $content = explode(' ', get_the_content(), $limit);
 if (count($content)>=$limit) {
 array_pop($content);
 $content = implode(" ",$content).'...';
 } else {
 $content = implode(" ",$content);
 }
 $content = preg_replace('/[.+]/','', $content);
 $content = apply_filters('the_content', $content);
 $content = str_replace(']]>', ']]&gt;', $content);
 return $content;
}

/*--------------------------------------------------
--Include "Display Widgets" Plugin------------------
--README:-------------------------------------------
--I DO NOT Own the "Display Widgets" Plugin.--------
--It is a free plugin provided in the wordpress-----
--Catalog of plugins.-------------------------------
--https://wordpress.org/plugins/display-widgets/  --
--------------------------------------------------*/
include('assets/plugins/display-widgets/display-widgets.php');

/*--------------------------------------------------
--Include "Easy Social Icons" Plugin----------------
--README:-------------------------------------------
--I DO NOT Own the "Easy Social Icons" Plugin.------
--It is a free plugin provided in the wordpress-----
--Catalog of plugins.-------------------------------
--https://wordpress.org/plugins/easy-social-icons/--
--------------------------------------------------*/
include('assets/plugins/easy-social-icons/easy-social-icons.php');
cnss_db_install();

/*--------------------------------------------------
--Include "Evyr Custom Inputs" Parts---------------
--------------------------------------------------*/
get_template_part('assets/admin/parts/credit', 'url');
get_template_part('assets/admin/parts/credit', 'text');
/*--------------------------------------------------
--Include "Evyr Preview Inputs" Parts---------------
--------------------------------------------------*/
get_template_part('assets/admin/parts/preview', 'customurl');
