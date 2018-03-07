<?php

function ony_customize_controls_registrer( $wp_customize ){

	$w = $wp_customize;
	$w->add_control( 'ony_option_color_scheme', array(
		'label'      => __( 'Color Scheme','ony'),
		'description'=> __( 'Select the palette colors for your WordPress\'s page.','ony'),
		'section'    => 'colors',
		'settings'   => 'ony_colors_scheme',
		'type'       => 'select',
		'choices'    => ony_control_choices_scheme(),
	) );

	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_background' , array(
		'label'       => __( 'Background','ony'),
		'section'     => 'colors',
		'settings'    => 'ony_background'

	) ) );
	$w->add_control( new WP_Customize_Color_Control( $w , 'mytmeme_header_background' , array(
		'label'       => __( 'Header Color','ony'),
		'description'	=> __( 'Select the color for your header page.','ony'),
		'section'     => 'colors',
		'settings'    => 'ony_header_background'
	) ) );

	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_sidebar_background' , array(
		'label'       => __( 'Sidebar Color','ony'),		
		'section'     => 'colors',
		'settings'    => 'ony_sidebar_background'
	) ) );

	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_post_background' , array(
		'label'       => __( 'Post Background','ony'),
		'description'	=> __( 'This color affects all the backgrounds of the posts on the page','ony'),
		'section'     => 'colors',
		'settings'    => 'ony_post_background'
	) ) );
	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_font_link' , array(
		'label'       => __( 'Font Link Color','ony'),
		'description'	=> __( 'Change color for links','ony'),
		'section'     => 'colors',
		'settings'    => 'ony_font_link'
	) ) );
	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_link_hover' , array(
		'label'       => __( 'Font link Hover','ony'),
		
		'section'     => 'colors',
		'settings'    => 'ony_link_hover'
	) ) );
	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_title_color' , array(
		'label'       => __( 'Title Color','ony'),
		
		'section'     => 'colors',
		'settings'    => 'ony_title_color'
	) ) );
	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_submit_color' , array(
		'label'       => __( 'Button Submit','ony'),
		
		'section'     => 'colors',
		'settings'    => 'ony_submit_color'
	) ) );
	$w->add_control( new WP_Customize_Color_Control( $w , 'ony_background_comment' , array(
		'label'       => __( 'Background Comments','ony'),
		'description'	=> __( 'Change the background color for the comments section.','ony'),
		'section'     => 'colors',
		'settings'    => 'ony_background_comment'
	) ) );


}

add_action( 'customize_register', 'ony_customize_controls_registrer');
