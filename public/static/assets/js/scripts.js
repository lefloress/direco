$(document).ready(function() {

	dpHeader($('.open-nav'), $('.main-nav'));
	dpHeader($('.open-form'), $('.form-login'));

	if ($('.select2').length) {
		// detect width screen to activate or disable at select2
		selectTwo();
		$(window).resize(selectTwo);
	}

	if ($('.catalog').length) {
		dpCatalog();
	}

	if ($('.flexslider').length) {
		$('.flexslider').flexslider({
	   		animation: "slide",
	    	controlNav: "thumbnails"
	  	});
  	}

  	if ($('.home-banner').length) {
  		dpAdvancedSearch();
  		$(window).resize(dpAdvancedSearch);
  	}

  	systemMessage();

});

function dpHeader (btn, element) {

	btn.on('click', function() {
		$(this).toggleClass('active');
		element.toggleClass('active');

		$('header .active').not(this).not(element).removeClass('active');
	});

}

function selectTwo () {

	var width = $(window).width(),
		maxWidth = 1024;

	if (width >= maxWidth) {	
		$('.select2').select2();
	} else {
		$('.select2').select2('destroy');
	}

}

function dpCatalog () {

	var btn = $('.catalog button');

	btn.on('click', function () {
		var element = $(this).parents('article');
		element.toggleClass('active');

		$('.catalog article.active').not(this).not(element).removeClass('active');
	});

}

function dpAdvancedSearch () {

	var btn = $('.open-advanced-search'),
		form = $('.form-advanced-search');

	btn.on('click', function () {
		$(this).toggleClass('active');
		form.toggleClass('active');
		
		if ($(window).width() >= 1024) {

			if (form.hasClass('active')) {
				$('#brand').select2('open');
			} else {
				form.removeClass('active');
				$('#brand').select2('close');
			}

		};

	});

}

function systemMessage() {

	var btnClose = $('.msg-close');

	btnClose.on('click', function () {
		$(this).parents('.system-messages').addClass('closed');
	});

}