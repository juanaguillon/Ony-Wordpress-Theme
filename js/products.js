  "use strict";
  function ony_products_js(){
    var outel = els;
    (function($){


    // Objecto creado, para acceder facilmente a los elemttos. 
    // Si es posible notar, son los elementos mas relevantes para poder crear el modal de manera dinamica.

    var Elements = {
      image : $('.woocommerce-product-gallery__image'),
      images: $('.woocommerce_product_gallery__images'),
      result: $('#result-preview-image'),
      close : $('#close-preview-gallery-images')

    }

    Elements.images.clone().appendTo('.result-preview-images');  

    Elements.results = $('.result-preview-images');
    Elements.image.click( function(){

      new_modal( $('.modal-ending-image'), $(this) , {
        toFind : 'img',
        toGet : 'data-src',  
        toSave: 'src',         
        toClose: Elements.close
      } );

    } );
    Elements.images.click( function(){

      new_modal( $('.modal-ending-image'), $(this) , {
        toFind : 'img',
        toGet : 'data-src', 
        toSave: 'src',       
        toClose: Elements.close
      } );      

    } );
    function new_modal( modal, toExec, obj ){
      var th = new_modal;  
      th.cssModal = {
        display      : 'block',
        top          : outel.wpadminbar.height(),
        "max-height" : "100vh",         
        "overflow-y" : 'auto'
      }
      $('body').css('overflow-y','hidden');
      modal.css( th.cssModal );
      th.data_obj = toExec.find( obj.toFind ).attr( obj.toGet );
      obj.toClose.click(function(){

        modal.css( 'display' , 'none');
        $('body').css('overflow-y','scroll');
      });

      // Mostrar la imagen correspondiente que se ha seleccionado.
      Elements.result.attr( obj.toSave , th.data_obj ); 

      Elements.results.find( obj.toFind ).click(function(){

        var attr_data = $(this).attr( obj.toGet );

        Elements.result.attr( obj.toSave , attr_data );
        
      });
    }  


    // End function jquery
    })(jQuery)    
  } 



