$(document).ready(function () {
    $nav = $('.profile-tabs');

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

    $('[placeholder]').each(function() {
        var placeholder = $(this).attr('placeholder');
        $(this).data('placeholder', placeholder);
    }).on('focus', function() {
        $(this).attr('placeholder', '');
    }).on('blur', function() {
        if ($(this).val() === '') {
            $(this).attr('placeholder', $(this).data('placeholder'));
        }
    });

    $( '.select-role-form' ).find('.role-submit').on('click', function(e) {
        e.preventDefault();

        var $button = $(this);
        var role = $button.data('role');
        var $form = $(this).parents('form');

        $form.find('input[name=role]').val(role);
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

    if ($nav.length !== 0) {
        var $slideLine = $(".o-block"),
        $tablinks = $nav.find('.tablinks.underline, .push-left, .push-right'),
        $tablinkParents = $nav.find('.activebig, .inactivebig'),
        $currentItem = $tablinks.filter('.active');

        if ($currentItem.length === 1) {
            $slideLine.css({
                "width": $currentItem.width(),
                "left": $currentItem.position().left
            });
        }

        $tablinks.on('click', function(){
            $tablinkParent = $(this).parents('.activebig,.inactivebig');

            if ($(this).is('.push-left')) {
                $tablinkParent = $tablinkParent.prev('.activebig,.inactivebig');
            } else if ($(this).is('.push-right')) {
                $tablinkParent = $tablinkParent.next('.activebig,.inactivebig');
            }
            $currentTablink = $tablinkParent.find('.tablinks');

            $slideLine.animate({
                "width": $currentTablink.width(),
                "left": $currentTablink.position().left
            });
            $tablinkParents.removeClass('activebig').addClass('inactivebig');
            $tablinks.filter('.tablinks').removeClass('active').addClass('inactive');

            $tablinkParent.removeClass('inactivebig').addClass('activebig');
            $currentTablink.removeClass('inactive').addClass('active');
        });
    }

    $('.tablinks,.push-left,.push-right').on('click', function(e) {
        // Declare all variables
        var city,  $this;

        //Get jQuery version of element
        $this = $(this);

        //Get city from
        if ($this.is('a')) {
            city = $this.attr('href');
        } else {
            city = $this.data('href');
        }
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

    $('input.money').on('change', function() {
        var value = $(this).val();
        console.log("hi");
        value = parseFloat(value);
        if (!isNaN(value)) {
            value = value.toFixed(2);
        } else {
            value = "";
        }
        $(this).val(value);

    })
});
