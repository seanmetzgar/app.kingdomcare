@extends('layouts.dashboard', ['bodyClass' => 'admin', 'hasAPI' => true])

@section('search-bar')
    <div class="booking search admin-user">
        <div class="container">
            <h2>Users</h2>
            <div class="booking-search-wrapper">
                <div class="name-wrapper">
                    <label for="sitterName">Search by Sitter or Parent</label>
                    <input class="filter" type="text" name="name" placeholder="Type Name Here..." onfocus="this.placeholder=''" onblur="this.placeholder='Type Name Here...'">
                    <button type="button"><i class="im im-magnifier"></i></button>
                </div>

                <div class="status-wrapper">
                    <label for="status">Status</label>
                    <select class="filter" id="status" name="status" size=1 onmousedown="if(this.options.length>1){this.size=4;}"  onchange='this.size=1;' onblur="this.size=1;">
                        <option value="" selected>All Statuses</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="type-wrapper">
                    <label for="typefilter">Account Type</label>
                    <select class="filter" id="typefilter" name="type" size=1 onmousedown="if(this.options.length>1){this.size=5;}"  onchange='this.size=1;' onblur="this.size=1;">
                        <option value="" selected>All Types</option>
                        <option value="parent">Parent</option>
                        <option value="sitter">Sitter</option>
                        <option value="admin">Administrator</option>
                        <option value="unknown">Unknown</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="space"></div>
        <div class="space container button-wrapper"><div class="add-invoice-contain">
                <div class="add-invoice">+<h6 class="btn-text">Add User</h6> </div>
        </div></div>
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="container sitter-search admin-user">

            <div class="content-block bookings admin-user-page">
                <h3 class="left">All Users</h3>
                <div class="sortby">
                    <h4 class="right dropbtn">Sort by <i class="im im-care-down"></i></h4>
                    <div class="dropdown-content myDropdown">
                        <button class="a-z">Alphabetical (A-Z)</button>
                        <button class="z-a">Alphabetical (Z-A)</button>
                        <button class="past-pres">Past - Present</button>
                        <button class="pres-pass">Present - Past</button>
                        <button class="l2h">Type</button>
                        <button class="for-stat">Active - Cancelled </button>
                        <button class="back-stat">Cancelled - Active </button></div>

                </div>
                <hr>
                <div class="table-container list">
                    <div class="flex-table header">
                        <div class="flex-row first sitter">
                            <div class="namecontain">
                                Name
                                <div class="name-arrow sortname">
                                    <div class="name-arrow-up arrow-up"></div><div class="name-arrow-down arrow-down"></div>
                                </div><!--namearrow-->
                            </div><!--namecontain-->
                        </div><!--flex-row-->
                        <div class="flex-row second bookingdate">
                            <div class="datecontain">
                                Created
                                <div class="name-arrow sortdate">
                                    <div class="date-arrow-up arrow-up"></div><div class="date-arrow-down arrow-down"></div>
                                </div><!--namearrow-->
                            </div><!--datecontain-->
                        </div><!--flex-row-->
                        <div class="flex-row third sortamount">
                            <div class="typecontain">
                                Type
                                <div class="name-arrow">
                                    <div class="amount-arrow-up arrow-up"></div><div class="amount-arrow-down arrow-down"></div>
                                </div><!--namearrow-->
                            </div><!--amountcontain-->
                        </div><!--flex-row-->
                        <div class="flex-row fourth statusbtn">
                            <div class="statcontain sortstat">Last Active
                                <div class="name-arrow sortstat">
                                    <div class="stat-arrow-up arrow-up"></div><div class="stat-arrow-down arrow-down"></div>
                                </div><!--namearrow-->
                            </div><!--statcontain-->
                        </div><!--flex-row-->
                        <div class="flex-row fourth-2 statusbtn">
                            <div class="active">Status
                                <div class="name-arrow sortstat">
                                    <div class="stat-arrow-up arrow-up"></div><div class="stat-arrow-down arrow-down"></div>
                                </div><!--namearrow-->
                            </div><!--statcontain-->
                        </div><!--flex-row-->

                        <div class="flex-row fifth"></div>
                    </div><!--header-->

                </div><!--table container-->

            </div><!--bookings-->

            <div class="space"></div>

        </div><!--container-->

    </div><!--content-->
@endsection

@section('extra-scripts')
<style>
body.admin .search.admin-user .name-wrapper {
    display: flex-item;
    width: auto;
    flex-basis: 48%;
}

body.admin .search.admin-user .type-wrapper,
body.admin .search.admin-user .status-wrapper {
    display: flex-item;
    width: auto;
    flex-basis: 24%;
    margin-top: 0;
}

body.admin .search.admin-user .type-wrapper label,
body.admin .search.admin-user .status-wrapper label {
    opacity: 1;
}

@media screen and (max-width: 750px) {
    body.admin .search.admin-user .type-wrapper,
    body.admin .search.admin-user .status-wrapper {
        margin-top: 2rem;
    }
}
</style>

<script>
$(document).ready(function() {
    var filterRequest = null;
    function getSortDate(date) {
        date = new Date(date);
        var string = date.getDate() + '/' +
            date.getMonth() + '/' +
            date.getFullYear();
        return string;
    }
    function getDisplayDate(date) {
        if (date !== null) {
            date = new Date(date);
            var string = date.getMonth() + '/' +
                date.getDate() + '/' +
                date.getFullYear();
        } else string = "---";
        return string;
    }
    function loadTable(data = null) {
        filterRequest = null;
        filterRequest = $.ajax({
            url: '/api/users',
            type: 'GET',
            data: data,
            headers: { 'Authorization' : 'Bearer ' + _BT }
        }).done(function(data) {
            if (typeof data === 'object') {
                if (data.hasOwnProperty('data')) {
                    if (typeof data.data === 'object') {
                        var users = data.data;
                        html = "";

                        $(users).each(function() {
                            primaryRole = 'Unknown';
                            primaryRoleID = 0;
                            if (this.attributes.hasOwnProperty('roles') && typeof this.attributes.roles === 'object' && this.attributes.roles.length > 0) {
                                primaryRole = this.attributes.roles[0].description;
                                primaryRoleID = this.attributes.roles[0].id;
                            }
                            switch(this.attributes.status) {
                                case "cancelled":
                                    status = '<div class="flex-row fourth status stat-con scheduled btn-outline" data-stat="3">' +
                                        '<img src="images/cancelled.svg"> Cancelled</div>\n';
                                    break;
                                case "inactive":
                                    status='<div class="flex-row fourth status stat-con awaiting-pay btn-outline" data-stat="2">' +
                                        '<img src="images/inactive.svg" alt="hour glass icon"> Inactive</div>\n';
                                    break;
                                case "active":
                                default:
                                    status='<div class="flex-row fourth status stat-con completed btn-outline" data-stat="1">' +
                                        '<img src="images/active.svg" alt="lightning bolt icon"> Active</div>\n';
                            }

                            html += '<div class="flex-table row list_item sortme">\n' +
                                '    <div class="flex-row first sitter-info">\n' +
                                '        <div class="img-wrapper">\n' +
                                '            <img class="circle-clip" src="images/profileimg.jpg" alt="profile image"/>\n' +
                                '        </div><!--imgwrapper-->\n' +
                                '        <h6 class="name">' + this.attributes.first_name + ' ' + this.attributes.last_name + '</h6>\n' +
                                '    </div>\n' +
                                '    <div class="flex-row second date" data-date="' + getSortDate(this.attributes.created_at) + '">\n' +
                                '        <div class="labelhide">Creation On: </div>\n' +
                                '        ' + getDisplayDate(this.attributes.created_at) + '\n' +
                                '    </div>\n' +
                                '    <div class="flex-row third type" data-type="' + primaryRoleID + '">' +
                                '        <div class="labelhide">\n' +
                                '            Type: ' +
                                '        </div>' +
                                '        ' + primaryRole + '\n' +
                                '    </div>\n' +
                                '    <div class="space"></div>\n' +
                                '\n' +
                                '    <div class="flex-row fourth-2 date2" data-date="' + getSortDate(this.attributes.last_active_at) + '">' +
                                '        <div class="labelhide">Last Active: </div>' +
                                '        ' + getDisplayDate(this.attributes.last_active_at) + '\n' +
                                '    </div>\n' +
                                '    ' + status +
                                '    <div class="flex-row fifth">\n' +
                                '        <a href="#" class="btn details edituser">View/Edit Profile</a>\n' +
                                '    </div>\n' +
                                '    <hr>\n' +
                                '</div><!--row-->'
                        });
                        $('.table-container.list').find('.list_item').remove();
                        $('.table-container.list').append(html);
                    }
                }
            }
        });
    }
    

    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    $(".dropbtn").click(function(){
        $(this).next(".myDropdown").addClass("show");
    });

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    }

    $('.namecontain').click(function(){
        showArrows();

        $(".labelclick").removeClass("labelclick");
        $(this).addClass("labelclick");

        if($(".sortname").hasClass('down') || $(".sortname").hasClass('start')){
            bigArrowUp();
            nameUp();
        } else {
            bigArrowDown();
            nameDown();
        }
    
    });

    $('.a-z').click(function(){
        $('.sortme').sort(alphaAscending).insertAfter('.header');
    });


    $('.z-a').click(function(){
        $('.sortme').sort(alphaDescending).insertAfter('.header');
    });


    $('.datecontain').click(function(){
        showArrows();

        $(".labelclick").removeClass("labelclick");
        $(this).addClass("labelclick");
        if($(".sortdate").hasClass('down') || $(".sortdate").hasClass('start')){
            bigArrowUp();
            dateUp();
        } else {
            bigArrowDown();
            dateDown();
        }
    });

    $('.past-pres').click(function() {
    $('.sortme').sort(sortDescending).insertAfter('.header');
    });


    $('.pres-pass').click(function() {
    $('.sortme').sort(sortAscending).insertAfter('.header');
    });



    $('.statcontain').click(function(){
        showArrows();

        $(".labelclick").removeClass("labelclick");
        $(this).addClass("labelclick");
        if($(".sortstat").hasClass('down') || $(".sortstat").hasClass('start')){
            statUp();
            bigArrowUp();
        } else {
            statDown();
            bigArrowDown();
        }
    });

    $('.for-stat').on('click', function () {
        $('.sortme').sort(statAscending).insertAfter('.header');
        
    });

    $('.back-stat').on('click', function () {
        $('.sortme').sort(statDescending).insertAfter('.header');
        
    });

    $('.typecontain').click(function(){
        showArrows();

        $(".labelclick").removeClass("labelclick");
        $(this).addClass("labelclick");
        if($(".type").hasClass('down') || $(".type").hasClass('start')){

            typeUp();
            bigArrowUp();
        } else {
            typeDown();
            bigArrowDown();
        }
    });

    $('.active').click(function(){
        showArrows();

        $(".labelclick").removeClass("labelclick");
        $(this).addClass("labelclick");
        if($(".active").hasClass('down') || $(".active").hasClass('start')){

            date2Up();
            bigArrowUp();
        } else {

            date2Down();
            bigArrowDown();
        }
    });

    $('.h2l').on('click', function () {
        $('.sortme').sort(amountAscending).insertAfter('.header');
        
    });

    $('.l2h').on('click', function () {
        $('.sortme').sort(amountDescending).insertAfter('.header');
        
    });





    // Filters
    $('input.filter, select.filter').on('change blur keyup', function(e) {
        filters = {};
        if ($('.filter[name=name]').val()) {
            filters.name = $('.filter[name=name]').val()
        }
        if ($('.filter[name=status]').val()) {
            filters.status = $('.filter[name=status]').val()
        }
        if ($('.filter[name=type]').val()) {
            filters.type = $('.filter[name=type]').val()
        }
        loadTable(filters);
    }).trigger('blur');

});

</script>
@endsection
