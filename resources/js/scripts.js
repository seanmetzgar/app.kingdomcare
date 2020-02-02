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

    $('.starrr').each(function() {
        var $this = $(this);
        var rating = this.hasAttribute('data-rating') ? parseInt($this.data('rating')) : null;
        var readOnly = $this.hasClass('read-only') ? true : false
        if (!isNaN(rating)) {
            $this.starrr({
                rating: rating,
                readOnly: readOnly
            })
        } else {
            $this.starr({
                readOnly: readOnly
            });
        }
    });

    // Sitter Profile Search Bar Shrink
    $(document).scroll(function () {
        var $nav = $(".sprofile .left");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $(".sprofile").height());
        $(".sitter-tab").toggleClass('scrolled', $(this).scrollTop() > $(".sprofile").height());
        $(".search.sprofile").toggleClass('scrolled', $(this).scrollTop() > $(".sprofile").height());
    });

    $('.tablinks').on('click', function(e) {
        // Declare all variables
        var city,  $this;

        //Get jQuery version of element
        $this = $(this);
        //Get city from
        city = $this.attr('href');
        city = (typeof city !== "string") ? false : city.trim();

        if (city !== false) {
            if (city.lastIndexOf('#', 0) === 0) {
                e.preventDefault();

                $('.tabcontent').hide();
                $('.tablinks').removeClass('active');

                $(city).show();
                $this.addClass('active');
            } else {
                return true;
            }
        } else { e.preventDefault(); }
    });
});
