<?php 

if ( ! defined('ABSPATH')){
  return;
}
echo '</div>';
if( mt_check_option('ony-sidebar-position','st-right') ){
  get_sidebar();
}
echo '</div></div>'; //Final del wrapper, se puede encontrar el comienzo en: ony/woocommerce/global/wrapper-start.php
?>

