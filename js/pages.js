"use strict";
var onyOptEx;
var els, settings_ = {};
var wind = jQuery(window);


(function(){
jQuery(document).ready(function($) {
  
els = {
  nav_primary: {
    elem: $('.primary_menu'),
    height: function(){
      return this.elem.outerHeight( true );
    },
    width: function(){
      return this.elem.outerWidth();
    },
    child: function( ){
      return this.elem.children();
    }
  },wpadminbar:{
    elem: $('#wpadminbar').length > 0 ? $('#wpadminbar'): undefined
  },footer:{
    elem: $('.footer-wrap').length > 0 ? $('.footer-wrap'):undefined
  }

}
els.wpadminbar.height = function(){
  if ( els.wpadminbar.elem !== undefined ){
    return els.wpadminbar.elem.outerHeight(  true );
  }else{
    return 0;
  }
}
els.footer.height = function(){
  if ( els.footer.elem !== undefined){
    return els.footer.elem.outerHeight( true );
  }else{
    return 0;
  }
}
// Existencia de footer en el tema.

settings_["margin-bottom"] = els.footer.height() + "px";

if ( typeof is_checkout_page !== "undefined" && is_checkout_page ){
var col_alt_offset = $('.col-alt').length ? parseInt( $('.col-alt-inside').offset().top + $('.col-alt').outerHeight( true ) + els.footer.height() ) : 0;


$(window).scroll(function(){

  var       
      alt = $(this).scrollTop() + wind.height(),
      check_fixed = ony_options.main_menu == "sticky" ? els.nav_primary.height() : 0,
      topset = parseInt($(window).height() - $('.col-alt-inside').outerHeight( true ) - els.footer.height() - 5 ) + 'px',
      col_alt_inside_obj = {
        "top"      : topset ,
        "position" : "fixed",
        "max-width": $('.col-alt-inside').parent().width() + 'px'
      }     
       
  if (alt  < col_alt_offset ){   
    col_alt_inside_obj.position = 'static'; 

  }
  $('.col-alt-inside').css( col_alt_inside_obj );

})
}


// Generar opciones de interfaz de usuario.
onyOptEx = { 

  menu_in_transition:function(){

    var display = false;
      $('#display_menu_primary').click(function(e){
        
        var cch = $(this).children('i');

        if (display) {
          
          els.nav_primary.elem.animate({top:'-'+els.nav_primary.height()+'px'});
          display = false;
          cch.removeClass('fa-angle-up');
          cch.addClass('fa-angle-down');
        }else{
          els.nav_primary.elem.animate({top:'0px'});
          display = true;
          cch.removeClass('fa-angle-down');
          cch.addClass('fa-angle-up');
        }
      });
      
      els.nav_primary.elem.animate({top:'-'+els.nav_primary.height()+'px'});
      $('.content-area, .content_area').css( settings_ );    
  },
  menu_in_static:function(){
    $('.content-area, .content_area').css( settings_ );
  },
  menu_in_sticky:function(){

    var ofs = $('#container_nav_menu_primary').offset().top;
    if ( $('.col-alt').length ){

      var col_alt_offset = $('.col-alt').offset().top;
    }
    

    $(window).scroll(function(event) {

      var alt = $(this).scrollTop();  

      alt = alt + els.wpadminbar.height();
        
      
      if(alt >= ofs){
        els.nav_primary.child().attr('class','menu-sticky');
        settings_.top = els.nav_primary.child().height();
        settings_.position = "relative";        
        
        // Si el "AdminBar" se encuentra activo.
              
        els.nav_primary.child().css('top', els.wpadminbar.height() + 'px');
          
        $('.content-area, .content_area').css( settings_ );         
        
        
      }else{
        els.nav_primary.child().removeClass('menu-sticky');

        settings_['top'] = "0px";

        $('.content-area, .content_area').css( settings_ );
      }   


    });

  },
  sidebar_in_left:function(){
    var def = false;
    $('.secondary').css( 'left', '-'+ $('.secondary').outerWidth() +'px' ); 

    $('.button_att_sidebar').click(function (e) {

      var el = $(this).parent().parent().parent(),
          width_sidebar = $('.secondary').outerWidth();

      if (def) {
        el.animate({left:'-'+ width_sidebar +'px'});
        def = false;
      }else{
        el.animate({left:'0'});
        def = true;
      }

      
    }); 
  },
  sidebar_in_right:function(){

    var def = false;  
    $('.secondary').css( 'right', '-'+ $('.secondary').outerWidth() +'px' );  
    $('.button_att_sidebar').click(function (e) {

      var el = $(this).parent().parent().parent(),
          width_sidebar = $('.secondary').outerWidth();

      if (def) {
        el.animate({right:'-'+ width_sidebar +'px'});
        def = false;
      }else{
        el.animate({right:'0'});
        def = true;
      }      

    });
    
  }
}  

if ( ony_options.woo_exists){
  ony_products_js();
}
switch (ony_options.main_menu) {  
  case 'sticky':
    onyOptEx.menu_in_sticky();
    break;
  case 'static':
    onyOptEx.menu_in_static();
    break;  
  case 'transition':
    onyOptEx.menu_in_transition();
}
switch (ony_options.sidebar_position) {  
  case 'right':
    onyOptEx.sidebar_in_right();
    break;
  default:
    onyOptEx.sidebar_in_left();
}
// End of jquery ready
});
// End of function global.
})();