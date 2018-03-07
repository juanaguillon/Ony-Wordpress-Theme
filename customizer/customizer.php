<?php


function ony_set_colors_scheme(  ){

	$cc = ony_options();
	$r = apply_filters( 'ony_colors',array(
			'default' => array(
		  'label'       => __( 'Default','ony'),
		  'colors'      => array(
				'#FF404C', // 0 Header Background 
				'#FFFFFF', // 1 Body Background
				'#FFFFFF', // 2 Sidebar background
				'#DDDDDD', // 3 Post Background
				'#3180CC', // 4 Font link
				'#3474B2', // 5 Hover Link
				'#FFD700', // 6 Title Color
				'#00708C', // 7 Submit Color Button and Border Comment
				'#FFFFFF', // 8 Background comments
			)	),

			'dark' => array(
				'label'  => __( 'Dark' , 'ony'),
				'colors' => array(
					'#1F1F1F',
					'#DCDCDC',
					'#D9D9D9',
					'#FFFFFF',
					'#DF9A2C',
					'#E39E31',
					'#E0E0E0',
					'#C87600',
					'#FFFFFF'
			)	),
			'blue' => array(
				'label'  => __( 'Blue' , 'ony'),
				'colors' => array(
					'#0025BF',
					'#C1CAFF',
					'#9EA9FF',
					'#FFFFFF', 
					'#3F3F3F',
					'#202020',
					'#C0DBFF',
					'#0072B3',
					'#C7CFFF'
				)
				),
			'custom' => array(
				'label'  => __( 'Custom' , 'ony')				
				)
	) );
	
	return $r;
}
	

function ony_control_choices_scheme(){

	$keys = ony_set_colors_scheme();
	$color_control = array();

	foreach ($keys as $k => $val ) {
		$color_control[$k] = $val['label'];
	}
	return $color_control;

}
