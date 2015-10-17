$(document).ready(function(){
	$('.slickify').slick({
		slidesToShow: 3,
		variableWidth: true,
		centerMode: true,
		autoplay: true,
		autoplaySpeed: 1500,
		pauseOnHover: true
	});

	$('.modal-trigger').leanModal();
});