(function($){
	$(document).ready(function(){
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
		$('#back-to-top').on('click', function(){$("html, body").animate({scrollTop: 0}, 500);return false;	});
		
		// menu multi dropdown
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	
	});
})(jQuery);