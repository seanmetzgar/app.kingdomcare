<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="main">
    <div id="app">
        <header>
            <nav>
                <div class="container">
                    <h1><a href="{{ route('index') }}">@include('dropins/svg/logo')</a></h1>

                    <div id="myNav" class="overlay">
                        <a href=""><img src="{{ asset('images/logo.svg') }}" class="hamlogo" alt="hamburger menu" /></a>
                        <a href="javascript:void(0)" class="closebtn">&times;</a>

                        <div class="overlay-content-top">
                            <a href=""><img class="somepadding" src="images/mock-photo.png" alt="profile picture"/></a>
                        </div>

                        <div class="overlay-content">
                            <a href="work.html">Calendar</a>
                            <a href="booking.html">Bookings</a>
                            <a href="payments.html">Invoices and Payments</a>
                            <a href="contact.html">My Reviews</a>
                            <a href="contact.html">Support</a>
                        </div>
                    </div>

                    <span id="ham" style="font-size:30px;cursor:pointer">&#9776;</span>

                    <div class="nav-left">
                        <div class="nav-top">

                            <a href="#"><img class="somepadding" src="images/mock-photo.png" alt="profile picture"/></a>
                        </div>
                        <ul class="nav-bottom">
                            <li><a href="calendar.html">Users</a></li>
                            <li><a href="booking.html">Bookings</a></li>
                            <li><a href="payments.html">User Payments</a></li>
                            <li><a href="reviews.html">Background Checks</a></li>
                            <li><a href="support.html">Revenue</a></li>
                            <li><a href="support.html">Reviews</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="sitter-dash search admin-filter-bar">
            <div class="container">
                <h2 class="left">Administrative Dashboard</h2>
{{--                <div class="status-wrapper right">--}}
{{--                    <label>Global Filter</label>--}}

{{--                    <h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>--}}
{{--                    <div class="filter-dropdown">--}}
{{--                        <button>This Week</button>--}}
{{--                        <button>This Month</button>--}}
{{--                        <button>This Quarter</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="space"></div>
            </div>
        </div>

        <div class="content">
            <div class="container admin-dash">
                <!-- START: New & Active Users -->
                <div class="two-section">
                    @include('dropins.app.dashblocks.newSignups')
                    @include('dropins.app.dashblocks.activeUsers')
                </div>
                <!-- END: New & Active Users -->

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
