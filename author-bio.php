<div class='author_info'>
  <h2 class='author_title'>
    <?php _e( 'Published By' ); ?>  
  </h2>
  <div>
  <?php 
  
  $autor_bio = apply_filters( 'ony_author_bio_avatar_size', 70 );

  echo get_avatar( get_the_author_meta( 'user_email' ), $autor_bio );
    
  ?>     
    <div class="autor_description">
      <h3 class='author_title'><?php echo get_the_author(); ?></h3>

      <span class="span_author_bio">
      <h3>The_author_meta('descriptiotn')</h3>
      <?php the_author_meta( 'description' ); ?>
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel='author'><?php printf( __( 'View all posts by %s' ), get_the_author() ); ?></a>
      </span>  
    </div>
  </div>
</div>