$(document).ready(function() {

    if ($('#brand-combos').length) {
        comboSearch();
        $(window).resize(comboSearch);
    }

});

function comboSearch() {

    var width = $(window).width(),
        maxWidth = 1024,    
        brand = $('#brand'),
        model = $('#model'),
        motor = $('#motor');

    model.attr('disabled', true);
    motor.attr('disabled', true);

    brand.change(function () {

        $.getJSON('/combos/models/' + $(this).val(), null, function (items) {
            model.populateSelect(items).attr('disabled', false);

            if (width >= maxWidth) {
                model.select2('open');
            }

            motor.attr('disabled', true).clearSelect();
        });
    });

    model.change(function () {
        $.getJSON('/combos/motors/' + $(this).val(), null, function (items) {
            motor.populateSelect(items);
            motor.attr('disabled', false);

            if (width >= maxWidth) {
                motor.select2('open');
            }
        });
    });

    motor.change(function () {
        location.href = $(this).val();
    });   

}