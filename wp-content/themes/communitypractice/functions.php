<?php
add_action( 'after_setup_theme', 'communitypractice_setup' );
function communitypractice_setup() {
load_theme_textdomain( 'communitypractice', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( ! isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'communitypractice' ) ) );
}
add_action( 'wp_enqueue_scripts', 'communitypractice_load_scripts' );
function communitypractice_load_scripts() {
wp_enqueue_style( 'communitypractice-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'communitypractice_footer_scripts' );
function communitypractice_footer_scripts() {
?>
<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'communitypractice_document_title_separator' );
function communitypractice_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'communitypractice_title' );
function communitypractice_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'the_content_more_link', 'communitypractice_read_more_link' );
function communitypractice_read_more_link() {
if ( ! is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
}
}
add_filter( 'excerpt_more', 'communitypractice_excerpt_read_more_link' );
function communitypractice_excerpt_read_more_link( $more ) {
if ( ! is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
}
}
add_filter( 'intermediate_image_sizes_advanced', 'communitypractice_image_insert_override' );
function communitypractice_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
return $sizes;
}
add_action( 'widgets_init', 'communitypractice_widgets_init' );
function communitypractice_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'communitypractice' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'communitypractice_pingback_header' );
function communitypractice_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'communitypractice_enqueue_comment_reply_script' );
function communitypractice_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function communitypractice_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'communitypractice_comment_count', 0 );
function communitypractice_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'logged-out-menu' => __( 'Logged Out Menu' ),
       )
     );
   }
   add_action( 'init', 'register_my_menus' );

function communitypractice_custom_post_type() {
    register_post_type('discussion',
        array(
            'labels'      => array(
                'name'          => __( 'Discussions', 'textdomain' ),
                'singular_name' => __( 'Discussion', 'textdomain' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'discussions' ), // my custom slug
            'show_in_menu' => true,
            'menu_icon' => 'dashicons-format-chat',
            'menu_position' => 2,
            'capability_type' => 'post',
            'taxonomies' => array( 'category', 'region' ),
            'supports' => array('title', 'editor', 'excerpt', 'comments')
        )
    );
    register_post_type('event',
        array(
            'labels'      => array(
                'name'          => __( 'Events', 'textdomain' ),
                'singular_name' => __( 'Event', 'textdomain' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'events' ), // my custom slug
            'show_in_menu' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'menu_position' => 3,
            'capability_type' => 'post',
            'taxonomies' => array( 'category', 'region' ),
            'supports' => array('title', 'editor', 'excerpt', 'comments')
        )
    );
}
add_action('init', 'communitypractice_custom_post_type');

function communitypractice_member_role() {
    add_role(
        'member_role',
        'Member',
        [
            'read'         => true,
            'edit_posts'   => false,
            'upload_files' => false,
        ]
    );
}
add_action('init', 'communitypractice_member_role');

function community_practice_member_role_caps() {
    $role = get_role( 'member_role' );
    $role->add_cap( 'manage_options', false );
}
 
// Add simple_role capabilities, priority must be after the initial role definition.
add_action( 'init', 'community_practice_member_role_caps', 11 );
if (!current_user_can('manage_options')) {
    add_filter('show_admin_bar', '__return_false');
}

function communitypractice_expert_role() {
    add_role(
        'expert_role',
        'Expert',
        [
            'read'         => true,
            'edit_posts'   => false,
            'upload_files' => false,
            'manage_options' => false
        ]
    );
}
add_action('init', 'communitypractice_expert_role');