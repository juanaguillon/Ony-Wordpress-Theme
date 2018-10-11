<?php get_header(); ?>

 
 <div class="content_area witter content-area" id="primary">
 	<main id="main" class="site_main" role="main">

 		
<?php 
		if ( have_posts() ): 

 			while ( have_posts() ) :
 			 the_post();
 			
 			?>
 			<div class='post-<?php the_ID(); ?>' <?php post_class( 'post single'); ?>>
 				<?php if ( has_post_thumbnail() ) : ?>	
				<div class="thumdail_post">
				<?php the_post_thumbnail( 'medium'); ?>
				</div>
 			</div> <!-- /thumdail_post -->			
 			<?php
 							endif;

 			
 		?>

 		<div class="post_header_title">
 			<h2 class="post_title"><?php the_title(); ?></h2>
 		</div>

 		<div class="post_content"><?php the_content(); ?></div>
		
		<?php 

		

			$args = array(
				'before'        => '<div class="clearing"></div><p class"page_links"><span class="links_title"> ' . __( 'Pages:' , 'ony') .'</span>',
				'after'         => '</p></div>',
				'link_before'   => '<span>',
				'link_after'    => '</span>',
				'separator'     => '>',
				'echo'          => 1
			);

			wp_link_pages( $args );		

		endwhile;//End while
 	else:
 		echo 'No hemos encontrado posts';
 	endif;
		?>

		<?php if (comments_open() || get_comments_number(  )) :?>

			<div class="comments_section">
				<div class="section_into">
					<?php comments_template( '/comments.php', true ); ?>
				</div>
			</div>
		<?php endif; ?>
 	</main>
 </div>
 <?php get_footer(); ?>