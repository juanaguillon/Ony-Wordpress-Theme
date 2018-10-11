(function($){

$(document).ready(function() {
		

	wp.customize ( 'ony_background', function(value){
		value.bind(function (newval){
			$ ('body').css( 'background-color',newval);
		});
	});

	wp.customize ( 'ony_header_background', function(value){
		value.bind( function (newval){
			$('#header_site').css('background-color', newval);
			$('.edit_post_admin i,.carc_post i').css( 'color', newval);
		})
	});

	wp.customize ( 'ony_sidebar_background' ,function(value){
		value.bind( function (newval){
			$( '#sidebar').css( 'background-color', newval);
		})
	})

	wp.customize( 'ony_post_background' , function(value){
		value.bind( function(newval){
			$( '.new_post, .content-area').css('background-color',newval);
		});
	});

	wp.customize( 'ony_font_link' , function(value){
		value.bind( function (newval){
			$( '.post-title a, .widget ul a').css( 'color',newval);
		})
	})

	wp.customize( 'ony_link_hover' , function(value){
		value.bind(function(newval){
			$( '.post-title a:hover, .widget ul a:hover').css('color', newval);
		})
	});

	wp.customize( 'ony_title_color' , function(value){
		value.bind(function(newval){
			$('#title_site a').css('color',newval);
		})
	})

	wp.customize( 'ony_submit_color' , function(value){
		value.bind( function(newval){
			$( '.submit').css( 'background-color',newval);
			$( '.comment-respond').css( 'border-color',newval);
		})
	})

	wp.customize( 'ony_background_comment' , function(value){
		value.bind( function(newval){
			$('.comment-list, .comment-respond').css('background-color',newval);
		})
	})	
	
});

})(jQuery)