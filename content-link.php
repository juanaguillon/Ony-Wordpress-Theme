<h1>Este es el content-link.php</h1>
<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
  <?php echo 'Thumdail de el tema' ?>
  <h1>
    Thumbnail del tema (TwentyFeeften)
  </h1>
  <header>
    <?php 
    if ( is_single() ) {
      echo 'Is single';
      the_title( sprintf( '<h1 class="entry_title"><a href="%s">', 'esc_url/twenty_feeften_get_link' ,'</a></h1>'));
      
    } else{
      echo 'Else (is_single)';
      the_title( sprintf( '<h2 class="entry_title"><a href="%s">', 'esc_url/twenty_feeften_get_link' ,'</a></h2>'));
    }
    
    ?>
  </header>

  <div class="entry_conten">
    <?php 
      the_content( sprintf( __( 'Continue reading %s' ), the_title( '<span class="screen_read_text">', "</span>", false ) ) );

      wp_link_pages( array(
        'before'      => '<div class="page_link_wp_link_pages"><span class="page_links_title">' . __( 'Pages:' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen_reader_pagelink">'. __( 'Page') .'</span>%',
        'separator'   => '<span class="screen_reader_separator>,</span>  '
      ) );
    ?>
  </div> 

  <?php 

  if ( is_single() && get_the_author_meta ( 'description' ) ) {
    get_template_part( 'author-bio' );
  }
  ?>
  
  <footer class="enry_footer_content">
    Este es el footer dentro del content_link.php 
    
  </footer>
  
</article>