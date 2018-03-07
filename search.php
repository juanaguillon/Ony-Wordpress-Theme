<?php get_header();
	
 ?>
<section id="primary" class="content-area witter">
	<main class='site_main' id='main' role='main'>
		<?php
		if (have_posts()) {
		?>
	
	<header class='page_header'>
		<h1 class="page_title"><?php printf( __( 'Search Results: %s', 'ony' ), get_search_query() ); ?></h1>
	</header>

	<?php	

	while ( have_posts() ) {
	the_post();

	get_template_part( 'content');

	}

	the_posts_pagination( array(
		'prev_text'          => __( 'Previous Page'),
		'next_text'          => __( 'Next page' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page' ) . ' </span>',
	) );		
	}else{
		get_template_part( 'content' , 'none');
	} 
	

?>	

	</main>
</section>
<?php get_footer(); ?>
