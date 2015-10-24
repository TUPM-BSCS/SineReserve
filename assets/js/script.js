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

	$('.datepicker').pickadate({
   		selectMonths: true, // Creates a dropdown to control month
   		selectYears: 40, // Creates a dropdown of 15 years to control year
   		year: 2015
	});	

	$('#textarea1').val('New Text');
  	$('#textarea1').trigger('autoresize');
});