<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('RAILSWARE_VERSION', '1.0.1');

function railsware_setup() {

	$hook_result = apply_filters_deprecated( 'elementor_hello_theme_load_textdomain', [ true ], '2.0', 'hello_elementor_load_textdomain' );
	if ( apply_filters( 'hello_elementor_load_textdomain', $hook_result ) ) {
		load_theme_textdomain( 'hello-elementor', get_template_directory() . '/languages' );
	}

	$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_menus', [ true ], '2.0', 'hello_elementor_register_menus' );
	if ( apply_filters( 'hello_elementor_register_menus', $hook_result ) ) {
		register_nav_menus( [ 'menu-1' => __( 'Header', 'railsware-demo' ) ] );
		register_nav_menus( [ 'menu-2' => __( 'Footer', 'railsware-demo' ) ] );
	}

}
add_action( 'after_setup_theme', 'railsware_setup' );

function overwrite_customizer($wp_customize) {
	$wp_customize->add_section( 'railsware_navigation' , array(
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
			'section'    => 'railsware_navigation',
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
			'section'    => 'railsware_navigation',
			'type'       => 'textarea',
		]
	) );
}
add_action('customize_register', 'overwrite_customizer');

function railsware_set_scripts() {
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-main', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', ['jquery']);
	wp_enqueue_script('bootstrap-main-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', ['jquery', 'bootstrap-main']);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'bootstrap-main', 'bootstrap-main-bundle']);
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
}
add_action( 'wp_enqueue_scripts', 'railsware_set_scripts' );