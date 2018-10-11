<?php

function ony_customize_settings_registrer( $wp_customize ){

	$w = $wp_customize;

	$w->add_setting( 'ony_colors_scheme' , array(

		'default'  => 'default',
		'type'     => 'option'
	));
	$w->add_setting( 'ony_background' , array(
			'default'  => '#000',
			'type'     => 'option',
			'transport'=> 'postMessage'
	) );

	$w->add_setting( 'ony_header_background' , array(
		'default'    => '#FF404C',
		'type'      => 'option',
		'transport' => 'postMessage'
	));
	$w->add_setting( 'ony_sidebar_background' , array(

		'default'   => '#FFFFFF',
		'type'      => 'option',
		'transport' => 'postMessage'
	));
	$w->add_setting( 'ony_post_background', array(
		'default'   => '#DDDDDD',
		'type'      => 'option',
		'transport' => 'postMessage'
	));

	$w->add_setting( 'ony_font_link', array(
		'default'    => '#3180CC',
		'type'       => 'option',
		'transport'  => 'postMessage'
	));

	$w->add_setting( 'ony_link_hover', array(
		'default'    => '#3474B2',
		'type'       => 'option',
		'transport'  => 'postMessage'
	));

	$w->add_setting( 'ony_title_color', array(
		'default'    => '#FFD700',
		'type'       => 'option',
		'transport'  => 'postMessage'
	));
	$w->add_setting( 'ony_submit_color', array(
		'default'    => '#00708C',
		'type'       => 'option',
		'transport'  => 'postMessage'
	));
	$w->add_setting( 'ony_background_comment', array(
		'default'    => '#FFFFFF',
		'type'       => 'option',
		'transport'  => 'postMessage'
	));
}



add_action( 'customize_register', 'ony_customize_settings_registrer');
