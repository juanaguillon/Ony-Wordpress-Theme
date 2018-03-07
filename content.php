<div class="posting">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'page_post' ); ?>>
		<?php 
	
		// Esta se mostrará en el index prácticamente.
		// Será la encargada de estructurar el bucle por cada entrada en la página.
	
		?>
		<?php if ( has_post_thumbnail() ) : ?>
		
			<div class="featured-media">
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				
					<?php the_post_thumbnail(); ?>
				
				</a>
				
			</div>
		
		<?php endif; ?>
	
		<div class="post-content">
		
			<?php
			if ( is_single()){
				the_content();
			}else{
				the_excerpt();   

			}

			?>
		
		</div>		
		
		<div class="post-header">
			
		    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	     
		    
		    	    
		</div> <!-- /post-header -->	
	
	</div> <!-- /post -->
	
	<?php 			

				if ( ! is_single() ) {
		
					?>
						<div class="edits_admin">
					<?php
					
					if( comments_open() ){
	
						?><div class="edit_post_admin"><?php
		
						comments_popup_link( '<i class="fa fa-comment"></i>' . __('Add Comment' , 'ony'), '<i class="fa fa-comment"></i>' . __('Last comment' , 'ony') , '<i class="fa fa-comment"></i>'. __( 'Last comments' , 'ony') );	
						?></div><?php
					}
					
		
					if ( current_user_can( 'edit_posts')) {
					
						edit_post_link( '<i class="fa fa-cogs"></i>' . __('Edit','ony') , '<div class="edit_post_admin">','</div>');	
		
					}
					?>
						</div>
					<?php
		
				}	
		
	
	
	  ?>
</div>
