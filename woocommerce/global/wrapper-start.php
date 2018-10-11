<?php 

/**
 * div.container abarcará todo el contenido que ha sido creado por woocommerce.
 * 
 */

if(! defined('ABSPATH')){
  return;
}
?>
<div id="container" class="content-area witter">
  <div class="content">

  <?php if( mt_check_option('ony-sidebar-position','st-left') ){
    get_sidebar();
  }
  ?>
  <div class="woo-all-content">   

 
 