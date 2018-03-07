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

		if ( is_single() ) :

			$args = array(
				'before'        => '<div class="clearing"></div><p class"page_links"><span class="links_title"> ' . __( 'Pages:' , 'ony') .'</span>',
				'after'         => '</p>',
				'link_before'   => '<span>',
				'link_after'    => '</span>',
				'separator'     => '>',
				'pageling'      => '%',
				'echo'          => 1
			);

			wp_link_pages( $args );

			?>
			
			<?php if ( has_category() ):  ?>
			<div class='post_category'><p><span class="span_category"><?php the_category( ',' ); ?></span></p></div>

			<?php endif; ?>
			<?php if (has_tag( )): ?>

				<div class="post_tag">
					<p class="post_tags"><?php the_tags(); ?></p>
				</div>

			<?php endif; ?>



		<?php
		endif;

		endwhile;//End while
 	else:
 		echo 'No hemos encontrado posts';
 	endif;
		?>

		<?php if (comments_open()) :?>

			<div class="comments_section">
				<div class="section_into">
					<?php comments_template( '/comments.php', true ); ?>
				</div>
			</div>
		<?php endif; ?>
 	</main>
 </div>
 <?php get_footer(); ?>