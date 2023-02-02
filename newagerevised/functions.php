<?php
/**
 * It adds support for the block editor, responsive embeds, post formats, post thumbnails, HTML5,
 * selective refresh widgets, and menus.
 */
function add_theme_scripts()
{
  // enqueue styles
  wp_enqueue_style('icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', array(), '1.1', 'all');
  // 
/* Adding a google font to the theme. */
  wp_enqueue_style('gfonts', 'https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap', array(), '1.1', 'all');
  // 
/* Adding a google font to the theme. */
  wp_enqueue_style('gfonts1', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap', array(), '1.1', 'all');
  // 
  /* Adding a google font to the theme. */
  wp_enqueue_style('gfonts2', 'https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap', array(), '1.1', 'all');
  // 
/* Enqueuing the styles.css file. */
  wp_enqueue_style('styles', get_template_directory_uri() . '//css/styles.css', array(), '1.1', 'all');
  // 
/* Enqueuing the bootstrap icons. */
  wp_enqueue_style('styles', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', array(), '1.1', 'all');
  // 
// enqueue script  
// 
  /* Enqueuing the bootstrap script. */
  wp_enqueue_script('bootstrapscript', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), 1.1, true);
  // 
  /* Enqueuing the script.js file. */
  wp_enqueue_script('scriptcpm', get_template_directory_uri() . '/js/script.js', array(), 1.1, true);
  // 
  /* Enqueuing the bootstrap template. */
  wp_enqueue_script('bootstraplates', 'https://cdn.startbootstrap.com/sb-forms-latest.js', array(), 1.1, true);

}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
// ending 

/**
 * Essential theme supports
 * */
function theme_setup()
{
  /** automatic feed link*/
  add_theme_support('automatic-feed-links');

  add_theme_support('align-wide');


  add_theme_support('core-block-patterns');


  add_theme_support('custom-line-height');

  add_theme_support('custom-units');


  add_theme_support('dark-editor-style');


  add_theme_support('wp-block-styles');


  add_theme_support('widgets');

  add_theme_support('widgets-block-editor');

  add_theme_support('responsive-embeds');


  add_theme_support('starter-content');
  /* Adding support for post formats. */
  $post_formats = array('aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status');
  add_theme_support('post-formats', $post_formats);

  /** post thumbnail **/
  add_theme_support('post-thumbnails');

  /** HTML5 support **/
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

  /** refresh widgest **/
  add_theme_support('customize-selective-refresh-widgets');

  /* Adding support for menus. */
  add_theme_support('menus');

  /* Registering the menu locations. */
  register_nav_menus(
    [
      'navbar-header' => 'Navbar Header',
      'navbar-footer' => 'Navbar Footer',
    ]
  );
}
add_action('after_setup_theme', 'theme_setup');
/* Including the functions.php file from the customizer-repeater folder. */
require get_template_directory() . '/customizer-repeater/functions.php';

/* Including the customizer.php file. */
require_once get_template_directory() . '/inc/customizer.php';


function newage__navcolor_css(){
  $accent_color = get_theme_mod('header_colors');
  if(!empty($accent_color)):
  ?>
  <style type="text/css" id="vilecustomizable-theme-option-css">
     
      #mainNav {
    background-color: <?php echo $accent_color; ?>;
}
  </style>
  <?php
  endif;
}
add_action( 'wp_head', 'newage__navcolor_css' );



function custom_repeater_field( $wp_customize, $id, $args ) {
  $wp_customize->add_setting( $id, array(
      'default' => '',
      'sanitize_callback' => 'wp_kses_post'
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, $id, array(
      'label' => $args['label'],
      'section' => $args['section'],
      'settings' => $id,
      'type' => 'text'
  ) ) );
}




?>