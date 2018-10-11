
<?php

/**
*El sinlge manejará cada post. Éste se esctucturarizá de manera que el desarrollador lo desee.
*/
get_header(); ?>
	
	<div id="primary" class="content-area witter" style='position: relative;'>
		<main id="main" class="site-main" role="main">

		<?php
		
	while ( have_posts() ) : 
		
		the_post();

		get_template_part( 'content', get_post_format() );

		
		if ( has_category() || has_tag() ){
			?><div class="carc_post"><?php
			if ( has_category() ) :
				
			?>
				<div class='category_post'>
					<span class='_anunced'><i class="fa fa-book"></i><?php echo __('Categories','ony'); ?></span>
					<h2 class="category_title_post"><?php the_category( ', '); ?></h2>
				</div>
			<?php
			
			endif;

			if ( has_tag() ) :
			?>
				<div class="tags_post">
					<span class='_anunced'><i class='fa fa-tag'></i><?php echo __('Tags','ony'); ?></span>
					<h2 class="title_tags_post"><?php the_tags( '' , ', '); ?></h2>
				</div>
				
			<?php
			endif;
			?></div><?php
		}
			



			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/<next></next> post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>'
			) );

		// End the loop.
	endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
