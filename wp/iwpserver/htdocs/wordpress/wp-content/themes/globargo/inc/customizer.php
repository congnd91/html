<?php
function belsip_customize_register( $wp_customize ) {

	$wp_customize->remove_section('colors');

	$wp_customize->add_setting( 'belsip_theme_options[site_logo]', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
		'label' => esc_html( 'Site Logo', 'belsip' ),
		'section' => 'title_tagline',
		'settings' => 'belsip_theme_options[site_logo]',
	)));

	// General Settings Section
	$wp_customize->add_section( 'general_section' , array(
    'title'       => esc_html__( 'General layout', 'belsip' ),
    'priority'    => 30,
    'description' =>'Customize layout for main posts stream on front page',
	) );

		// Sidebar Position
		$wp_customize->add_setting( 'sidebar_position', array(
        'default'  => 'right',
        'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'sidebar_position', array(
    	'type'     => 'radio',
        'label'    => esc_html__( 'Sidebar Position', 'belsip' ),
        'section'  => 'general_section',
        'settings' => 'sidebar_position',
        'priority' => 1,
        'choices'  => array(
        	'right' => esc_html__( 'Right', 'belsip' ),
        	'left' => esc_html__( 'Left', 'belsip' ),
        	'none' => esc_html__( 'No Sidebar', 'belsip' ),
	        ),
        ) );

         // Menu style
		$wp_customize->add_setting( 'menu_visible', array(
        'default'  => 'yes',
        'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control('menu_visible', array(
    	'type'     => 'radio',
        'label'    => esc_html__( 'Menu Visible ?', 'belsip' ),
        'section'  => 'general_section',
        'settings' => 'menu_visible',
        'priority' => 3,
        'choices'  => array(
        	'no' => esc_html__( 'No', 'belsip' ),
        	'yes' => esc_html__( 'Yes', 'belsip' ),
	        ),
        ) );


    // Copyrights Settings Section
    $wp_customize->add_section( 'copyrights_settings' , array(
    'title'       => esc_html__( 'Copyrights', 'belsip' ),
    'priority'    => 35,
    ) );

        // Copyrights
        $wp_customize->add_setting( 'copyrights', array(
        'default'   => 'ALL RIGHTS RESERVED. Designed by <a href="https://themeforest.net/user/cizthemes" target="_blank">CIZ THEMES</a>',
        'sanitize_callback' => 'esc_html',
        ) );

        $wp_customize->add_control( 'copyrights', array(
        'label'     => esc_html__( 'Copyrights', 'belsip' ),
        'section'   => 'copyrights_settings',
        'type'      => 'textarea',
        'priority'  => 1,
        ) );

    // Single Page Section
    $wp_customize->add_section( 'single_section' , array(
    'title'       => esc_html__( 'Single Page', 'belsip' ),
    'priority'    => 30,
    'description' =>'Customize layout for main posts stream on front page',
    ) );

        // Authors 
        $wp_customize->add_setting( 'author_visible', array(
        'default'  => 'no',
        'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'author_visible', array(
        'type'     => 'radio',
        'label'    => esc_html__( 'Author Info Visible', 'belsip' ),
        'section'  => 'single_section',
        'settings' => 'author_visible',
        'priority' => 1,
        'choices'  => array(
            'no' => esc_html__( 'No', 'belsip' ),
            'yes' => esc_html__( 'Yes', 'belsip' ),
            ),
        ) );

         // Social 
        $wp_customize->add_setting( 'social_visible', array(
        'default'  => 'no',
        'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control('social_visible', array(
        'type'     => 'radio',
        'label'    => esc_html__( 'Social Share Visible ?', 'belsip' ),
        'section'  => 'single_section',
        'settings' => 'social_visible',
        'priority' => 3,
        'choices'  => array(
            'no' => esc_html__( 'No', 'belsip' ),
            'yes' => esc_html__( 'Yes', 'belsip' ),
            ),
        ) );

         // Counter 
        $wp_customize->add_setting( 'counter_visible', array(
        'default'  => 'no',
        'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control('counter_visible', array(
        'type'     => 'radio',
        'label'    => esc_html__( 'Couter View, Comment Visible ?', 'belsip' ),
        'section'  => 'single_section',
        'settings' => 'counter_visible',
        'priority' => 3,
        'choices'  => array(
            'no' => esc_html__( 'No', 'belsip' ),
            'yes' => esc_html__( 'Yes', 'belsip' ),
            ),
        ) );



}
add_action( 'customize_register', 'belsip_customize_register' );

function belsip_get_theme_option( $option_name, $default = '' ) {
  $options = get_option('belsip_theme_options' );
  if( isset($options[$option_name]) ) {
    return $options[$option_name];
  }
  return $default;
}

function belsip_return_value( $value ) {
	if ( '' != $value ) {
		return $value;
	} else {
		return '';
	}
}
