$(document).ready(function(){
	
	//Initialize
	var rippled = false;
	
	//Ripple
	function manualRipple(element, x, y) {
		var $div = $('<div/>');
		   $div.addClass('ripple-effect');
		   var $ripple = $(".ripple-effect");
		   
		   $ripple.css("height", $(element).height());
		   $ripple.css("width", $(element).height());
		   $div
		     .css({
		       top: y - ($ripple.height()/2),
		       left: x - ($ripple.width()/2),
		       background: $(element).data("ripple-color")
		     }) 
		     .appendTo($(element));

		   window.setTimeout(function(){
		     $div.remove();
		   }, 700);
	}
	
	//Fixed-tab
  	var tab_container = $('div.tab-container');
  	$(window).scroll(function() { //when window is scrolled
		if($(window).scrollTop() + 64 > tab_container.offset().top) {
			tab_container.removeClass('navbar').addClass('navbar-fixed');
			$('nav.main-nav').addClass('z-depth-0');
			if(!rippled) {
				$("body, html").animate({ 
					scrollTop: $(tab_container).offset().top - 63 
				}, 1);
				manualRipple('nav#meet-1.grey.main-nav.ripple', $('nav#meet-1.grey.main-nav.ripple').width() / 2, $('nav#meet-1.grey.main-nav.ripple').height() * 2);
				rippled = true;
			}
		}
		else {
			rippled = false;
			tab_container.removeClass('navbar-fixed').addClass('navbar');
			$('nav.main-nav').removeClass('z-depth-0');
		}
	});
		
});
