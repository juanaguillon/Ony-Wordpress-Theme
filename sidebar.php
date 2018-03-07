<?php
if( mt_check_option('ony-sidebar-position','none')){
	return;
}else{	
	if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="sidebar" class="secondary" >
			
				<div id="widget-area" class="widget-area">
					<?php 
					
					dynamic_sidebar( 'sidebar-1' );
					
					if (mt_check_option('ony-sidebar-position',array('right','left') ) || ! get_option('ony_sidebar_position') ):
					
					?>
					
					<div class="att_sidebar">
						<button class='button_att_sidebar'><i class='fa fa-bars'></i></button>
					</div>
					<?php endif; ?>	
				</div><!-- .widget-area -->		
			
		</div><!-- .secondary -->

	<?php endif; 
}

