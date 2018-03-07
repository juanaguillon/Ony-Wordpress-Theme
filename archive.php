<?php 

get_header();

/*
*Este archivo se encargará de mostrar los posts correspondientes que están definidos por categorias.
*'Busqueda por categoria'
*/

?>
Asjdlkajsd
<section id='primary' class='content_area witter'>
	<main id='main' class='site_main' role='main'>
		<?php if ( have_posts() ){ ?>

			<?php 
			
			the_archive_title( '<h2 class="pagie-title">','</h2>' );
			the_archive_description( '<div class="taxonomy_descritpion">','</div>' );				 ?>

			<?php 

				while ( have_posts() ) {
					
					the_post();

					get_template_part( 'content' , get_post_format() );

				}

				the_posts_pagination( array(
					'prev_text'         => __( 'Previous page' ),
					'next_text'         => __( 'Next page'), 
					'before_page_number'=> '<span class="meta_nav screen_reader_text">' . __( 'Page' , 'ony') . '</span>' 
				) );

			}else{

				get_template_part( 'content' , 'none' );
			}

			?>


	</main>
</section>

<?php
	wp_footer();
?>