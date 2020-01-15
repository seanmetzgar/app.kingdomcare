$(document).ready(function () {
    $( '.datepicker' ).datepicker();

    // Mobile Nav Overlay
    $( '#ham').on('click', function() {
        $( '#myNav' ).addClass('open');
    });
    $( '#myNav').find( '.closebtn' ).on('click', function() {
        $( '#myNav' ).removeClass('open');
    });
});
