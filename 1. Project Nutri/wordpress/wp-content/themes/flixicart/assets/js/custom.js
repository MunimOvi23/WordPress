(function($) {
  'use strict';
    $( document ).ready(function() {
       $('.browse-cat-main-btn').on('click',function(e){
			e.preventDefault();
			$('.browse-cat-wrap').toggleClass("active");
			if ($('.browse-cat-wrap').hasClass("active")) {
				setTimeout(function(){
					$('.browse-cat-menu-wrap-list').removeClass('closed');
				}, 100);
				$('.browse-cat-menu-wrap .browse-cat-menu-wrap-list').slideDown(700);
			} else {
				$('.browse-cat-menu-wrap-list').addClass('closed');
				$('.browse-cat-menu-wrap .browse-cat-menu-wrap-list').slideUp(700);
			}
			e.stopPropagation();
		});
	       
    });

}(jQuery));