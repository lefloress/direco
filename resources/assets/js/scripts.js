$(document).ready(function() {

	dpHeader($('.open-nav'), $('.main-nav'));
	dpHeader($('.open-form'), $('.form-login'));

	if ($('.select2').length) {
		// detect width screen to activate or disable at select2
		selectTwo();
		$(window).resize(selectTwo);
	}

  	if ($('.home-banner').length) {
  		dpAdvancedSearch();
  		$(window).resize(dpAdvancedSearch);
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

  	systemMessage();

  	if ($('.form-filter').length) {
  		filterSearch('brands');
  	}

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
		if (!$('.select2-container').length) {
			$('.select2').select2();
		}
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

function filterSearch(who) {

	var input = $('.form-filter input'),
		value = '';

	input.keyup(function() {
		value = input.val().toUpperCase();

		$('.brands li').each(function () {
			if ($(this).find('img').attr('alt').indexOf(value) == -1) {
				$(this).hide();				
			} else {
				$(this).show();
			}
		});

		$('.catalog article').each(function () {
			if ($(this).find('button').text().indexOf(value) == -1) {
				$(this).hide();				
			} else {
				$(this).show();
			}
		});

	});

}

var estado = $('#estado');

if (estado.length) {

    var municipio = $('#municipio');
    var parroquia = $('#parroquia');

    function changeEstado (estado, municipio, parroquia) {
        parroquia.clearSelect();

        var id = estado.val();

        if (id == "") {
            municipio.clearSelect();
        } else {
            $.getJSON('/combos/municipios/' + id, null, function (items) {
                municipio.populateSelect(items);
            });
        }
    }

    function changeMunicipio (municipio, parroquia) {
        var id = municipio.val();

        if (id == "") {
            parroquia.clearSelect();
        } else {
            $.getJSON('/combos/parroquias/' + id, null, function (items) {
                parroquia.populateSelect(items);
            });
        }
    }

    estado.change(function() { changeEstado(estado, municipio, parroquia) });
    municipio.change(function () { changeMunicipio(municipio, parroquia) });
}

$.fn.clearSelect = function () {
    var id = $(this).attr('id'),
        select = document.getElementById(id);

    while(select.hasChildNodes()) {
        select.removeChild(select.firstChild);
    }
};

$.fn.populateSelect = function(items) {

    $(this).clearSelect();

    var id = $(this).attr('id'),
    	select = document.getElementById(id);

    addOption(select, '', 'Seleccione:');

    for (var i in items) {
        addOption(select, i, items[i]);
    }

    return $(this);
};

function addOption(select, value, text) {
    var option = document.createElement("option");
    option.value = value;
    option.appendChild(document.createTextNode(text));
    select.appendChild(option);
}