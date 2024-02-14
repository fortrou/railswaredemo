<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('RAILSWARE_VERSION', '1.0.1');

function starter_setup() {

    load_theme_textdomain( 'tkotukstarter', get_template_directory() . '/languages' );
    register_nav_menus( [ 'menu-1' => __( 'Header', 'railsware-demo' ) ] );
    register_nav_menus( [ 'menu-2' => __( 'Footer', 'railsware-demo' ) ] );
}
add_action( 'after_setup_theme', 'starter_setup' );

function overwrite_customizer($wp_customize) {
	$wp_customize->add_section( 'tkotuk_navigation' , array(
		'title'      => __( 'Railsware navigation section', 'mytheme' ),
		'priority'   => 10,
	));
	$wp_customize->add_setting(
		'logo_svg_code',
		array(
			'default' => '',
			'type' => 'theme_mod', // you can also use 'theme_mod'
			'capability' => 'edit_theme_options'
		),
	);
	$wp_customize->add_setting(
		'sublogo_svg_code',
		array(
			'default' => '',
			'type' => 'theme_mod', // you can also use 'theme_mod'
			'capability' => 'edit_theme_options'
		),
	);
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'logo_svg_code',
		[
			'label'      => __( 'Logo SVG code', 'textdomain' ),
			'description' => __( 'Put logo svg markup here', 'textdomain' ),
			'settings'   => 'logo_svg_code',
			'priority'   => 10,
			'section'    => 'tkotuk_navigation',
			'type'       => 'textarea',
		]
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sublogo_svg_code',
		[
			'label'      => __( 'Additional logo SVG code', 'textdomain' ),
			'description' => __( 'Put additional logo svg markup here', 'textdomain' ),
			'settings'   => 'sublogo_svg_code',
			'priority'   => 10,
			'section'    => 'tkotuk_navigation',
			'type'       => 'textarea',
		]
	) );
}
add_action('customize_register', 'overwrite_customizer');

function starter_set_scripts() {
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-main', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', ['jquery']);
	wp_enqueue_script('bootstrap-main-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', ['jquery', 'bootstrap-main']);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'bootstrap-main', 'bootstrap-main-bundle']);
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], '1.5');
}
add_action( 'wp_enqueue_scripts', 'starter_set_scripts' );