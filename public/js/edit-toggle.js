$(document).ready(function() {

    let el = $('#edit-toggle');
    let edit_elements = $('.edit-elements');

    el.click(function() {
        let show_edit_elements = el.attr('show');

        if (show_edit_elements === 'on') {
            el.removeClass('fa-toggle-on').addClass('fa-toggle-off');
            el.attr('show', 'off');
            edit_elements.hide(0);
            toggle = 'false';
        } else {
            el.removeClass('fa-toggle-off').addClass('fa-toggle-on');
            el.attr('show', 'on');
            edit_elements.removeClass('d-none').show(0);
            toggle = 'true';
        }

        $.ajax({
            url: '/cookie/show_edit_elements/' + toggle,
            method: 'GET',
        });
    });

});