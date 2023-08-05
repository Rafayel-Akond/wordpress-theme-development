<?php
/*
* My Theme Function
*/


// Theme Title
add_theme_support('title-tag');


// Theme CSS and jQuery File calling
function ak_css_js_file_calling(){
  wp_enqueue_style('ak-style', get_stylesheet_uri());
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.3.1', 'all');
  wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.1.1', 'all');
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('custom');


  // jQuery
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.3.1', 'true' );
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.1.1', 'true' );

}
add_action('wp_enqueue_scripts', 'ak_css_js_file_calling');


// Theme Function
function ak_customizer_register($wp_customize){
  $wp_customize->add_section('ak_header_area', array(
    'title' =>__('Header Area', 'akond'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  $wp_customize->add_setting('ak_logo', array(
    'default' => get_bloginfo('template_directory') . '/img/logo.jpg',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ak_logo', array( 
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'setting' => 'ak_logo',
    'section' => 'ak_header_area',
  ) ));

}

add_action('customize_register', 'ak_customizer_register');