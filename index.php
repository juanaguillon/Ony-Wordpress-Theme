<?php

get_header();

?>

<div class='new_post content-area witter'>
	<?php
	if ( get_option('ony-sidebar-position') == "st-left" ){
		get_sidebar();
	}
	
	if ( have_posts() ) {

		if ( is_home() && ! is_front_page() ) {
			?>
				<header>
					<h2 class='__sak'><?php echo single_post_title(); ?></h2>
				</header>
			<?php
		}
	echo "<div class='all-postings'>";
	while ( have_posts() ){

		the_post();

		get_template_part( 'content' , get_post_format() );
	}
	echo "</div>";

}else{

	get_template_part( 'content', __( 'Posts no found') );
}
	if (mt_check_option('ony-sidebar-position','st-right')){
			get_sidebar();
	}

	?>

</div>

<?php	
	get_footer();
?>
