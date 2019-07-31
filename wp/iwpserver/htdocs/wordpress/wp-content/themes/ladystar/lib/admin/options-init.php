<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "devon_opts";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => false,
        'menu_title'           => __( 'Settings', 'ladystar' ),
        'page_title'           => __( 'Settings', 'ladystar' ),
        'google_api_key'       => '',
        'admin_bar'            => false,
        'admin_bar_icon'       => 'dashicons-admin-tools',
        'admin_bar_priority'   => 5,
        'global_variable'      => '',
        'dev_mode'             => false,
        
        'page_parent'          => 'listing',
        'page_permissions'     => 'manage_options',
        'menu_type'            => 'submenu',
        'menu_icon'            => 'dashicons-admin-tools',
        'page_slug'            => 'devon_opts',
        'save_defaults'        => true,
        'default_show'         => true,
        'default_mark'         => '*',
        'show_import_export'   => false,
        'show_options_object' => false,
        'transient_time'       => '3600',
        'output'               => true,
        'output_tag'           => true,
        'database'             => 'options',
        'use_cdn'              => true,

        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => 'cluetip',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'fade',
                    'duration' => '50',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'fade',
                    'duration' => '50',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'ladystar' ), $v );
    } else {
        $args['intro_text'] = __( '', 'ladystar' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'ladystar' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'ladystar' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ladystar' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'ladystar' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ladystar' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'ladystar' );
    Redux::setHelpSidebar( $opt_name, $content );


    /////////////////////////////////////////////////
    // SECTION: General
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'General', 'ladystar' ),
            'id'     => 'general-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                array(
                    'id'       => 'website-logo',
                    'type'     => 'media',
                    'url'      => true,                
                    'title'    => __( 'Website Logo', 'ladystar' ),
                    'subtitle' => __( 'Full logo of the website.', 'ladystar' ),
                    'desc'     => __( '', 'ladystar' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'iban-number',
                    'type'     => 'text',
                    'url'      => true,                
                    'title'    => __( 'IBAN Number', 'ladystar' ),
                    'subtitle' => __( 'IBAN Account Number.', 'ladystar' ),
                    'desc'     => __( '', 'ladystar' ),
                    'default'  => '',
                ),				
                array(
                    'id'       => 'bic-number',
                    'type'     => 'text',
                    'url'      => true,                
                    'title'    => __( 'BIC Number', 'ladystar' ),
                    'subtitle' => __( 'BIC Number.', 'ladystar' ),
                    'desc'     => __( '', 'ladystar' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'load-duration',
                    'type'     => 'select',
                    'title'    => __( 'Auto Reload Time', 'ladystar' ),
                    'subtitle' => __( 'Reload time for the datatables in the admin section.', 'ladystar' ),
                    'desc'     => __( '', 'ladystar' ),
                    'options'  => array(
                        '60000' => '1 minute',
                        '300000' => '5 minutes',
                        '900000' => '15 minutes',
                        '1800000' => '30 minutes',
                    ),
                    'default'  => '60000',
                ),
            )
        ) );
    } // endif 1


    /////////////////////////////////////////////////
    // SECTION: Promotions
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Promotions', 'ladystar' ),
            'id'     => 'promotions-settings',
            'desc'   => __( 'Options to set up promotions here.', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
				array(
					'id'=>'section_promo',
					'type' => 'section',
					'title' => __('Promo', 'ladystar'),
					'subtitle'=> __('Settings for "Promo" ads.', 'ladystar'),                            
					'indent' => true // Indent all options below until the next 'section' option is set.
				),
				
					array(
						'id'       => 'promo-price',
						'type'     => 'text',
						'title'    => __( 'Promo Ad Price', 'ladystar' ),
						'subtitle' => __( 'Enter price for "Promo" ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => '2',
					),
					array(
						'id'       => 'promo-time',
						'type'     => 'text',
						'title'    => __( 'Promo Ad Time', 'ladystar' ),
						'subtitle' => __( 'Enter time in Hours for "Promo" ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => '120',
					),
					array(
						'id'       => 'promo-btn_text',
						'type'     => 'text',
						'title'    => __( 'Promo Button Text', 'ladystar' ),
						'subtitle' => __( 'Enter Button Text for Promo Ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => __( 'Promote Ad', 'ladystar' ),
					),
				
				array(
					'id'=>'section-promo',
					'type' => 'section', 
					'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
				// Top Ad
				array(
					'id'=>'section_top',
					'type' => 'section',
					'title' => __('Top', 'ladystar'),
					'subtitle'=> __('Settings for "Top" ads.', 'ladystar'),                            
					'indent' => true // Indent all options below until the next 'section' option is set.
				),
				
					array(
						'id'       => 'top-price',
						'type'     => 'text',
						'title'    => __( 'Top Ad Price', 'ladystar' ),
						'subtitle' => __( 'Enter price for "top" ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => '1',
					),
					array(
						'id'       => 'top-time',
						'type'     => 'text',
						'title'    => __( 'Top Ad Time', 'ladystar' ),
						'subtitle' => __( 'Enter time in Hours for "Top" ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => '24',
					),
					array(
						'id'       => 'top-btn_text',
						'type'     => 'text',
						'title'    => __( 'Top Button Text', 'ladystar' ),
						'subtitle' => __( 'Enter Button Text for Top Ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => __( 'Make Top Ad', 'ladystar' ),
					),
				
				array(
					'id'=>'section-top',
					'type' => 'section', 
					'indent' => false // Indent all options below until the next 'section' option is set.
				),
				
				// Home Ad
				array(
					'id'=>'section_home',
					'type' => 'section',
					'title' => __('home', 'ladystar'),
					'subtitle'=> __('Settings for "home" ads.', 'ladystar'),                            
					'indent' => true // Indent all options below until the next 'section' option is set.
				),
				
					array(
						'id'       => 'home-price',
						'type'     => 'text',
						'title'    => __( 'Home Ad Price', 'ladystar' ),
						'subtitle' => __( 'Enter price for "Home" ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => '3',
					),
					array(
						'id'       => 'home-time',
						'type'     => 'text',
						'title'    => __( 'Home Ad Time', 'ladystar' ),
						'subtitle' => __( 'Enter time in Hours for "home" ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => '72',
					),
					array(
						'id'       => 'home-btn_text',
						'type'     => 'text',
						'title'    => __( 'Home Button Text', 'ladystar' ),
						'subtitle' => __( 'Enter Button Text for home Ad.', 'ladystar' ),
						'desc'     => __( '', 'ladystar' ),
						'default'  => __( 'Make Home Ad', 'ladystar' ),
					),
				
				array(
					'id'=>'section-home',
					'type' => 'section', 
					'indent' => false // Indent all options below until the next 'section' option is set.
				),
            )
        ) );
    } // endif 1

    /////////////////////////////////////////////////
    // SECTION: Header
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Header', 'ladystar' ),
            'id'     => 'header-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
               
            )
        ) );
    } // endif 1


    /////////////////////////////////////////////////
    // SECTION: Footer
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Footer', 'ladystar' ),
            'id'     => 'footer-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                
            )
        ) );
    } // endif 1


    /////////////////////////////////////////////////
    // SECTION: Ads
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Ads', 'ladystar' ),
            'id'     => 'listing-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(                
                array(
                    'id'       => 'eyes',
                    'type'     => 'textarea',
                    'title'    => __( 'Eye Color Options', 'ladystar' ),
                    'subtitle' => __( 'Enter the Eye Color options.', 'ladystar' ),
                    'desc'     => __( 'Comma separated list of values', 'ladystar' ),
					'rows'		=> 2,
                    'default'  => 'Blue, Brown, Black, Green',
                ),          
                array(
                    'id'       => 'hair_color',
                    'type'     => 'textarea',
                    'title'    => __( 'Hair Color Options', 'ladystar' ),
                    'subtitle' => __( 'Enter the Hair Color options.', 'ladystar' ),
                    'desc'     => __( 'Comma separated list of values', 'ladystar' ),
					'rows'		=> 2,
                    'default'  => 'Red, Blonde, Brown, Black',
                ), 
				array(
                    'id'       => 'price_options',
                    'type'     => 'textarea',          
                    'title'    => __( 'Price Options', 'ladystar' ),
                    'subtitle' => __( 'Enter the Price options.', 'ladystar' ),
                    'desc'     => __( 'Comma separated list of values', 'ladystar' ),
					'rows'		=> 2,
                    'default'  => '80lv-120lv, 120lv-200lv, 200lv+',
                ), 
            )
        ) );
    } // endif 1


    /////////////////////////////////////////////////
    // SECTION: Search Page
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Search Page', 'ladystar' ),
            'id'     => 'search-page-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                
            )
        ) );
    } // endif 1


    /////////////////////////////////////////////////
    // SECTION: Admin Settings
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Admin Settings', 'ladystar' ),
            'id'     => 'admin-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                
            )
        ) );
    } // endif 1
	
    /////////////////////////////////////////////////
    // SECTION: Webmaster Settings
    /////////////////////////////////////////////////
    if ( 1 ) {
        Redux::setSection( $opt_name, array(
            'title'  => __( 'Webmaster Settings', 'ladystar' ),
            'id'     => 'webmaster-settings',
            'desc'   => __( '', 'ladystar' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                array(
                    'id'       => 'header-scripts',
                    'type'     => 'textarea',
                    'title'    => __( 'Header Scripts', 'ladystar' ),
                    'subtitle' => __( 'Enter the scripts to go in wp_head section.', 'ladystar' ),
                    'desc'     => __( 'To be used for analytics and other sripts.', 'ladystar' ),
                    'default'  => '',
                ),          
            )
        ) );
    } // endif 1