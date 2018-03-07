<?php 
$css_style_custom = '<style>';

/**
* ony-option-main-menu
* Esta opcion, añade estilos a el menu principal, para poder estar en transition, sticky (Pegajoso) o simplemente estatico.
*/

if ( get_option('ony-option-main-menu') == "transition" || ! get_option('ony-option-main-menu') ){

  $css_style_custom .= <<<CSS
    .primary_menu{
      background-color: #DAEBF2;	    
      position: relative;
      width: 100%; 
      background-color: white;   
    }
    
    .menu-item{
      display: inline-block;      	
    }
   
  
CSS;

}elseif ( get_option('ony-option-main-menu') == "sticky" ){

$css_style_custom .= <<<CSS
    .primary_menu{
      position: relative;    
      background-color: white;
      width: 100%;
    }   
    .menu-sticky{    
      position: fixed;
      box-shadow: 0 0 3px rgba(0,0,0,0.5);
      background-color: white;      
      z-index: 60;
      width: 100%;       
    }
    .menu-item{
      display: inline-block;
    }
   
  
CSS;
}    
  
elseif( get_option('ony-option-main-menu') == "static"){
  $css_style_custom .= <<<CSS
    
    #container_nav_menu_primary{      
      background-color: #ffffff;
      box-shadow: 0 0 1px #868686;
      z-index: 60;
    }  
    .menu-item{
      display: inline-block;
    }
   
    .content-area{
      margin-top: 6px !important;
      
    }
CSS;

}

/** 
* 
* ony-sidebar-position 
* En la mayoria de estas opciones, lo unico que se intenta implementar, es lograr que con,
* cada opcion (Experiencia de usuario) se mantengan diferentes estilos para dar un mejor
* resultado a cada uno de ellos.

* @since 4.4
* @package ony
*/

if(mt_check_option('ony-sidebar-position','left',true)){
  $css_style_custom .= <<<CSS
  .secondary{
    position: fixed;
    top: 0; 
    background-color: white;
    box-shadow: 0 0 2px #E1E1E1;
    z-index: 61;
    padding:3em 1em;
    width: 20%;
    height:100%;
    transition: all 0.4s;
    
  }
  .att_sidebar .button_att_sidebar{
    padding: 5px;
  }
  .att_sidebar{
  position: absolute;
  left: 100%; 
  top: 49%;
  }
  .att_sidebar .button_att_sidebar{ 
    font-size: 20px;  
    background-color: white;
    box-shadow: 1px 0 6px #AFAFAF;  
    outline: none;
    cursor: pointer;
  }

CSS;
}
  

elseif (mt_check_option('ony-sidebar-position','right')){

  $css_style_custom .= <<<CSS
  .secondary{
    position: fixed;
    top: 0; 
    background-color: white;
    box-shadow: 0 0 2px #E1E1E1;
    z-index: 55;
    padding:3em 1em;
    width: 20%;
    height:100%;
    transition: all 0.4s;   
  }
  .att_sidebar .button_att_sidebar{
    padding: 5px;
  }
  .att_sidebar{
    position: absolute;
    right: 100%; 
    top: 49%;
  }
  .att_sidebar .button_att_sidebar{ 
    font-size: 20px;  
    background-color: white;
    box-shadow: 1px 0 6px #AFAFAF;  
    outline: none;
    cursor: pointer;
  }
CSS;

} 
elseif(mt_check_option('ony-sidebar-position',array('st-right','st-left') ) ){

  $css_style_custom .= <<<CSS
  .all-postings,.woo-all-content{
    width:78%;
  }
  .all-postings,.secondary,.woo-all-content{
    display:inline-block;
    vertical-align:top;
  }
  .secondary{
    width:21%;
    border-right:1px solid #DEDEDE;
  }
CSS;
}
$css_style_custom .= '</style>';



