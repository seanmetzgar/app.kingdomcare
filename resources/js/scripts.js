$(document).ready(function () {
    $( '.datepicker' ).datepicker();

    // Mobile Nav Overlay
    $( '#ham').on('click', function() {
        $( '#myNav' ).addClass('open');
    });
    $( '#myNav').find( '.closebtn' ).on('click', function() {
        $( '#myNav' ).removeClass('open');
    });

    $('.logout-link').on('click', function(e) {
        e.preventDefault();
        $( '#logout-form' ).submit();
    });

    $( '.select-role-form' ).find('.role-submit').on('click', function(e) {
        e.preventDefault();

        var $button = $(this);
        var role = $button.data('role');
        var $form = $(this).parents('form');

        $form.find('input[name=role]').val(role);
        console.log('hi');
        $form.submit();
    });
});
