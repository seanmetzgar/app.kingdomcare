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

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="main">
	<header>
		<nav>
			<div class="container">
				<h1><a href="#">
                    @include('dropins/svg/logo')
                </a></h1>

				<div id="myNav" class="overlay" style="transform: translateX(100%);">
				<a href=""><img src="images/logo.svg" class="hamlogo" alt="hamburger menu" /></a>
      		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      			<div class="overlay-content-top">

				<a href=""><img class="somepadding" src="images/mock-photo.png" alt="profile picture"/></a>
				     </div>
      <div class="overlay-content">

        <a href="work.html">Calendar</a>
        <a
     href="booking.html">Bookings</a>
         <a href="payments.html">Invoices and Payments</a>
         <a href="contact.html">My Reviews</a>
         <a href="contact.html">Support</a>
      </div>
    </div>


    <span id="ham" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <script>
    function openNav() {
        document.getElementById("myNav").style.transform = "translateX(0%)";
    }

    function closeNav() {
        document.getElementById("myNav").style.transform = "translateX(100%)";
    }
    </script>



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
		<div class="status-wrapper right">
		<label>Global Filter</label>

			<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
		</div>
		<div class="space"></div>
		</div>
	</div>


	<div class="content">
		<div class="container admin-dash">
			<div class="two-section">
				<div class="dashblock signups">
					<h3 class="left">New Signups</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
						<div class="contentcontain"><div class="bignum">{{ $newSignups }}</div>
						<div class="rightside">
							<div class="newparents">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.11 64"><title>Artboard 3</title><path class="p" d="M13.94,53.61l.79-1s1.52-2,3.28-4.49A1,1,0,1,0,16.37,47c-1,1.38-1.83,2.57-2.43,3.37C10.58,45.87,6.25,39.31,6,36.6l2.52-1v1a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1v-5a4,4,0,0,0,2.31.76H15a4.09,4.09,0,0,0,2.54-.87v5.1a1,1,0,0,0,2,0v-7a18.61,18.61,0,0,0,2.18-2.79,20.59,20.59,0,0,0,2.74-10.79V14.72H15.49A3.51,3.51,0,0,1,12,11.21V11a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1v.24a3.51,3.51,0,0,1-3.51,3.51h-3v1.36A20.83,20.83,0,0,0,6.19,26.86a18.35,18.35,0,0,0,2.32,2.95V33.5L2,36V14.37A12.27,12.27,0,0,1,12.9,2.05,12,12,0,0,1,26.08,14V25.17a1,1,0,0,0,2,0V14.43A14.29,14.29,0,0,0,14.76,0,14,14,0,0,0,0,14L0,36.78a1.45,1.45,0,0,0,2,1.36l2.12-.81c1,4.76,8.19,14.14,9.06,15.26Zm-6-27.8a18.37,18.37,0,0,1-2.41-9.09h1A5.51,5.51,0,0,0,11,14.37a5.48,5.48,0,0,0,4.5,2.35H22.4A18.27,18.27,0,0,1,20,25.81a19.06,19.06,0,0,1-3.68,4.13,2,2,0,0,1-1.38.46H12.83a2.05,2.05,0,0,1-1.32-.49A18.29,18.29,0,0,1,7.9,25.81Z"/><path class="p" d="M59.47,15.75a2.28,2.28,0,0,0-1-.59,19,19,0,0,0,.17-2.39V12.7A12.58,12.58,0,0,0,47.49.06,12.35,12.35,0,0,0,34,12.34v.43a23.55,23.55,0,0,0,.16,2.4,2.3,2.3,0,0,0-1.65,2.2l1.07,3.88L36,22.65,38,27c.35.94,4.41,4.35,4.41,4.35a4.69,4.69,0,0,0,2.5.77H47.5a4.69,4.69,0,0,0,2.76-.89v3a1,1,0,0,0,2,0V33l1.81.65a8,8,0,0,1-7,7.12,1,1,0,0,0-.88,1,1,1,0,0,0,1.13,1A10,10,0,0,0,56,34.3l.3-2-4-1.43V29.59a7.41,7.41,0,0,0,2.07-2.49l2.16-4.41,2.85-1.43.75-3.7v-.17A2.21,2.21,0,0,0,59.47,15.75ZM36,12.34A10.35,10.35,0,0,1,47.3,2.05a10.53,10.53,0,0,1,9.34,10.59v.13a18.17,18.17,0,0,1-.19,2.41l-.39.39-1.53-4.31-.05-2.17a2.18,2.18,0,0,0-.81-1.65A2.13,2.13,0,0,0,51.9,7L46.15,8.16,40.73,7a2.12,2.12,0,0,0-2.55,2l0,2.19L36.4,15.59l-.25-.26A20.48,20.48,0,0,1,36,12.77Zm21.61,7.57L55,21.2l-2.5,5.1c-.28.75-1.78,2-2.78,2.83l-.48.4a2.64,2.64,0,0,1-1.78.61H45a2.72,2.72,0,0,1-1.71-.64l-.81-.67a9.86,9.86,0,0,1-2.56-2.59l-2.37-5-2.27-1.31-.75-2.64a.29.29,0,0,1,.28-.21h.28l2.07,2.11,3-7.53,0-2.56L40.32,9l5.82,1.22L52.29,9a.16.16,0,0,1,.13,0,.16.16,0,0,1,.06.13l.05,2.5,2.71,7.59,2.15-2.15h.46a.22.22,0,0,1,.18.08.2.2,0,0,1,.07.13Z"/><path class="p" d="M50.47,61.41A10.9,10.9,0,0,0,45.26,58l-7.93-2.8a1.86,1.86,0,0,1-1.25-1.76v-1a5.7,5.7,0,0,0,1.62-2l1.75-3.57,2.36-1.18.64-3.13v-.17A2,2,0,0,0,41.89,41a2,2,0,0,0-.75-.5,15.28,15.28,0,0,0,.12-1.83v-.36A10.33,10.33,0,0,0,29.94,28a10.52,10.52,0,0,0-9.33,10.58v.05a17.89,17.89,0,0,0,.11,1.85,2.06,2.06,0,0,0-1.33,1.93l.91,3.31,2,1.16L24,50.41a6.88,6.88,0,0,0,2.1,2.4v.85A1.58,1.58,0,0,1,25,55.15L16.69,58a11,11,0,0,0-5.16,3.49,4.15,4.15,0,0,0-.72,1.34.93.93,0,0,0,.9,1.19h.17a1,1,0,0,0,.87-.67,1.82,1.82,0,0,1,.33-.59,9,9,0,0,1,4.24-2.86l5-1.69a9.86,9.86,0,0,0,17.38,0l5,1.74a9,9,0,0,1,4.3,2.77,2,2,0,0,1,.34.61,1,1,0,0,0,.91.7h.12a.94.94,0,0,0,.91-1.2A3.89,3.89,0,0,0,50.47,61.41ZM22.61,38.27a8.33,8.33,0,0,1,8.9-8.3,8.52,8.52,0,0,1,7.75,8.6v.08l-1.32-1.11A4,4,0,0,0,34,34H28a4,4,0,0,0-4,3.52l-1.45,1.23s0-.1,0-.14Zm3.21,11.36-2-4.17L22,44.39l-.59-2H23l-.17-1.13,2.83-2.4,0,0a.94.94,0,0,0,.09-.12.8.8,0,0,0,.13-.19c0-.05,0-.11,0-.17s0-.13,0-.2A.43.43,0,0,0,26,38a2,2,0,0,1,2-2H34a2,2,0,0,1,2,2s0,.05,0,.08a.24.24,0,0,0,0,.08.69.69,0,0,0,.08.28s0,.07.07.11a1.39,1.39,0,0,0,.15.19l0,0L39,41.08a.28.28,0,0,1,0,.09l-.2,1.17h1.63v0l-.4,2-2.1,1-2.08,4.26a10,10,0,0,1-2.23,2.25l-.4.33a2,2,0,0,1-1.35.46H29.84a2.05,2.05,0,0,1-1.3-.49l-.67-.55A8.28,8.28,0,0,1,25.82,49.63ZM31,61.39a7.82,7.82,0,0,1-6.76-3.86l2.18-.82a2.59,2.59,0,0,0,1.67-2.41,4.18,4.18,0,0,0,1.75.43h2.1a4.08,4.08,0,0,0,2.15-.61,2.73,2.73,0,0,0,1.65,2.51l2,.88A7.83,7.83,0,0,1,31,61.39Z"/></svg>
                                <h6><strong>{{ $newParents }}</strong> Parents</h6>
							</div><!--newparents-->
							<div class="newsitters">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.45 219.2"><defs><style>.a{fill:none;stroke-width:7px;}.a,.b{stroke:#bcb0c4;stroke-miterlimit:10;}.b{stroke-width:3px;}</style></defs><title>teddy</title><path class="a" d="M148.3,17C140,6.47,128.88-1.3,118.31,7A24.16,24.16,0,0,0,109.77,20c-2.73-1.69-5.41-3.24-7.93-4.63a34.56,34.56,0,0,0-33.26,0c-2.49,1.37-5.12,2.9-7.81,4.56a24.08,24.08,0,0,0-7-11.81C44-1,32.18,5.83,23,15.66s-12.19,19-2.37,28.09a24.21,24.21,0,0,0,9.63,5.5A25.54,25.54,0,0,0,27.78,60c0,10.78,7.89,20.8,17.83,29.15-9.09,1.82-20,8.08-29.53,17.67C.33,122.67.87,135.07,9.47,142.59c7.22,6.32,17.82,7.18,30.36-2.11a107.78,107.78,0,0,0-1,15.24,100.17,100.17,0,0,0-11.13,23.15c-4.52,13.27-5.57,23.81-4.14,31.83a6.06,6.06,0,0,0,6,5H58.41a6.07,6.07,0,0,0,5.42-3.34,91.36,91.36,0,0,0,4.81-11.65c.94-2.75,1.75-5.49,2.47-8.2H99.34c.71,2.71,1.53,5.45,2.47,8.2a91.36,91.36,0,0,0,4.81,11.65A6.07,6.07,0,0,0,112,215.7h28.84a6.08,6.08,0,0,0,6-5c1.43-8,.38-18.56-4.14-31.83a100.58,100.58,0,0,0-11.13-23.15,108,108,0,0,0-1-15.25c12.54,9.3,23.15,8.44,30.37,2.12,8.6-7.52,9.14-19.92-6.61-35.82-9.5-9.59-20.45-15.85-29.53-17.67,9.93-8.35,17.82-18.37,17.82-29.15a25.29,25.29,0,0,0-2.45-10.56,24,24,0,0,0,8.06-4.16C158.84,37,156.57,27.6,148.3,17Z"/><path class="b" d="M103.17,41.85a4.59,4.59,0,1,1-4.59,4.59A4.59,4.59,0,0,1,103.17,41.85Z"/><path class="b" d="M67.28,41.85a4.59,4.59,0,1,1-4.59,4.59A4.59,4.59,0,0,1,67.28,41.85Z"/><path class="a" d="M85.22,56.06c15.26,0,27.62,8,27.62,17.8,0,5.14-3.37,9.76-8.75,13a37,37,0,0,1-18.87,4.81,36.9,36.9,0,0,1-18.89-4.83C61,83.6,57.61,79,57.61,73.86,57.61,64,70,56.06,85.22,56.06Z"/><path d="M42.72,22.49a1.61,1.61,0,0,1,.39,0c1.85.48,3.16,3,4,7.06a87.51,87.51,0,0,0-7.76,7.05c-2.76-.76-5.57-2-6.15-3.85C32,29,39.73,22.49,42.72,22.49m0-7h0c-5.46,0-11.23,5.16-13.78,8.63-3.37,4.59-3.18,8.39-2.44,10.77,1.88,6,8.72,7.88,11,8.5l4,1.11,2.89-3A80.88,80.88,0,0,1,51.48,35l3.3-2.66L54,28.22a23.84,23.84,0,0,0-2.34-6.91,10.78,10.78,0,0,0-6.76-5.56,8.81,8.81,0,0,0-2.13-.26Z"/><path class="a" d="M95.84,168.65c-.25.09-.49.18-.74.25a35.5,35.5,0,0,1-19.76,0c-.25-.07-.49-.17-.73-.25A19.28,19.28,0,0,1,61.75,147.8a61.7,61.7,0,0,1,1.55-7.9c3.76-14.19,12.14-24.14,21.92-24.14s18.17,9.95,21.93,24.14a63.48,63.48,0,0,1,1.55,7.9A19.24,19.24,0,0,1,95.84,168.65Z"/><path d="M127.63,22.22c2.87,0,10.33,7.35,8.79,11.09-.65,1.59-3,2.55-5.5,3.12a88,88,0,0,0-8.14-7.31c1.17-4.13,2.7-6.56,4.61-6.88l.24,0m0-7h0a8.1,8.1,0,0,0-1.4.12c-7.16,1.2-9.44,9.23-10.19,11.87l-1.26,4.48,3.64,2.91a80.13,80.13,0,0,1,7.48,6.71l2.74,2.81,3.82-.87c5.46-1.23,9-3.69,10.44-7.29,1-2.46,1.48-6.48-2-11.68-2.1-3.13-7.57-9.06-13.27-9.06Z"/><path class="a" d="M98.92,73.15c0-4.88-6.13-8.83-13.7-8.83s-13.69,4-13.69,8.83S98.92,78,98.92,73.15Z"/></svg>
                                <h6><strong>{{ $newSitters }}</strong> Sitters</h6>
							</div><!--newsitters-->
							<div class="space"></div>

							<div class="statpercent">
                            @if(isset($deltaSignups) && isset($deltaSignupsSpan))
                                @if(is_int($deltaSignups))
                                    @if($deltaSignups > 0)
								@include('dropins.svg.greenarrow')
                                <p class="statup"><strong>Up {{ $deltaSignups }}% </strong>from previous {{ $deltaSignupsSpan }}</p>
                                    @elseif($deltaSignups < 0)
                                @include('dropins.svg.redarrow')
                                <p class="statdown"><strong>Down {{ abs($deltaSignups) }}% </strong>from previous {{ $deltaSignupsSpan }}</p>
                                    @elseif($deltaSignups === 0)
                                <p><strong>No change </strong>from previous {{ $deltaSignupsSpan }}</p>
                                    @endif
                                @else
                                <p><strong>Can't calculate </strong>change from previous {{ $deltaSignupsSpan }}</p>
                                @endif
                            @else
                                <p>&nbsp;</p>
                            @endif
							</div><!--statpercent-->

						</div><!--rightside-->
					</div><!--contentcontain-->

						<a href="#" class="btn">View Full Report </a>

				</div><!--signups-->



				<div class="dashblock users">
					<h3 class="left">Active Users</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
						<div class="contentcontain"><div class="bignum">47</div>
						<div class="rightside">
							<div class="newparents">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.11 64"><title>Artboard 3</title><path class="p" d="M13.94,53.61l.79-1s1.52-2,3.28-4.49A1,1,0,1,0,16.37,47c-1,1.38-1.83,2.57-2.43,3.37C10.58,45.87,6.25,39.31,6,36.6l2.52-1v1a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1v-5a4,4,0,0,0,2.31.76H15a4.09,4.09,0,0,0,2.54-.87v5.1a1,1,0,0,0,2,0v-7a18.61,18.61,0,0,0,2.18-2.79,20.59,20.59,0,0,0,2.74-10.79V14.72H15.49A3.51,3.51,0,0,1,12,11.21V11a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1v.24a3.51,3.51,0,0,1-3.51,3.51h-3v1.36A20.83,20.83,0,0,0,6.19,26.86a18.35,18.35,0,0,0,2.32,2.95V33.5L2,36V14.37A12.27,12.27,0,0,1,12.9,2.05,12,12,0,0,1,26.08,14V25.17a1,1,0,0,0,2,0V14.43A14.29,14.29,0,0,0,14.76,0,14,14,0,0,0,0,14L0,36.78a1.45,1.45,0,0,0,2,1.36l2.12-.81c1,4.76,8.19,14.14,9.06,15.26Zm-6-27.8a18.37,18.37,0,0,1-2.41-9.09h1A5.51,5.51,0,0,0,11,14.37a5.48,5.48,0,0,0,4.5,2.35H22.4A18.27,18.27,0,0,1,20,25.81a19.06,19.06,0,0,1-3.68,4.13,2,2,0,0,1-1.38.46H12.83a2.05,2.05,0,0,1-1.32-.49A18.29,18.29,0,0,1,7.9,25.81Z"/><path class="p" d="M59.47,15.75a2.28,2.28,0,0,0-1-.59,19,19,0,0,0,.17-2.39V12.7A12.58,12.58,0,0,0,47.49.06,12.35,12.35,0,0,0,34,12.34v.43a23.55,23.55,0,0,0,.16,2.4,2.3,2.3,0,0,0-1.65,2.2l1.07,3.88L36,22.65,38,27c.35.94,4.41,4.35,4.41,4.35a4.69,4.69,0,0,0,2.5.77H47.5a4.69,4.69,0,0,0,2.76-.89v3a1,1,0,0,0,2,0V33l1.81.65a8,8,0,0,1-7,7.12,1,1,0,0,0-.88,1,1,1,0,0,0,1.13,1A10,10,0,0,0,56,34.3l.3-2-4-1.43V29.59a7.41,7.41,0,0,0,2.07-2.49l2.16-4.41,2.85-1.43.75-3.7v-.17A2.21,2.21,0,0,0,59.47,15.75ZM36,12.34A10.35,10.35,0,0,1,47.3,2.05a10.53,10.53,0,0,1,9.34,10.59v.13a18.17,18.17,0,0,1-.19,2.41l-.39.39-1.53-4.31-.05-2.17a2.18,2.18,0,0,0-.81-1.65A2.13,2.13,0,0,0,51.9,7L46.15,8.16,40.73,7a2.12,2.12,0,0,0-2.55,2l0,2.19L36.4,15.59l-.25-.26A20.48,20.48,0,0,1,36,12.77Zm21.61,7.57L55,21.2l-2.5,5.1c-.28.75-1.78,2-2.78,2.83l-.48.4a2.64,2.64,0,0,1-1.78.61H45a2.72,2.72,0,0,1-1.71-.64l-.81-.67a9.86,9.86,0,0,1-2.56-2.59l-2.37-5-2.27-1.31-.75-2.64a.29.29,0,0,1,.28-.21h.28l2.07,2.11,3-7.53,0-2.56L40.32,9l5.82,1.22L52.29,9a.16.16,0,0,1,.13,0,.16.16,0,0,1,.06.13l.05,2.5,2.71,7.59,2.15-2.15h.46a.22.22,0,0,1,.18.08.2.2,0,0,1,.07.13Z"/><path class="p" d="M50.47,61.41A10.9,10.9,0,0,0,45.26,58l-7.93-2.8a1.86,1.86,0,0,1-1.25-1.76v-1a5.7,5.7,0,0,0,1.62-2l1.75-3.57,2.36-1.18.64-3.13v-.17A2,2,0,0,0,41.89,41a2,2,0,0,0-.75-.5,15.28,15.28,0,0,0,.12-1.83v-.36A10.33,10.33,0,0,0,29.94,28a10.52,10.52,0,0,0-9.33,10.58v.05a17.89,17.89,0,0,0,.11,1.85,2.06,2.06,0,0,0-1.33,1.93l.91,3.31,2,1.16L24,50.41a6.88,6.88,0,0,0,2.1,2.4v.85A1.58,1.58,0,0,1,25,55.15L16.69,58a11,11,0,0,0-5.16,3.49,4.15,4.15,0,0,0-.72,1.34.93.93,0,0,0,.9,1.19h.17a1,1,0,0,0,.87-.67,1.82,1.82,0,0,1,.33-.59,9,9,0,0,1,4.24-2.86l5-1.69a9.86,9.86,0,0,0,17.38,0l5,1.74a9,9,0,0,1,4.3,2.77,2,2,0,0,1,.34.61,1,1,0,0,0,.91.7h.12a.94.94,0,0,0,.91-1.2A3.89,3.89,0,0,0,50.47,61.41ZM22.61,38.27a8.33,8.33,0,0,1,8.9-8.3,8.52,8.52,0,0,1,7.75,8.6v.08l-1.32-1.11A4,4,0,0,0,34,34H28a4,4,0,0,0-4,3.52l-1.45,1.23s0-.1,0-.14Zm3.21,11.36-2-4.17L22,44.39l-.59-2H23l-.17-1.13,2.83-2.4,0,0a.94.94,0,0,0,.09-.12.8.8,0,0,0,.13-.19c0-.05,0-.11,0-.17s0-.13,0-.2A.43.43,0,0,0,26,38a2,2,0,0,1,2-2H34a2,2,0,0,1,2,2s0,.05,0,.08a.24.24,0,0,0,0,.08.69.69,0,0,0,.08.28s0,.07.07.11a1.39,1.39,0,0,0,.15.19l0,0L39,41.08a.28.28,0,0,1,0,.09l-.2,1.17h1.63v0l-.4,2-2.1,1-2.08,4.26a10,10,0,0,1-2.23,2.25l-.4.33a2,2,0,0,1-1.35.46H29.84a2.05,2.05,0,0,1-1.3-.49l-.67-.55A8.28,8.28,0,0,1,25.82,49.63ZM31,61.39a7.82,7.82,0,0,1-6.76-3.86l2.18-.82a2.59,2.59,0,0,0,1.67-2.41,4.18,4.18,0,0,0,1.75.43h2.1a4.08,4.08,0,0,0,2.15-.61,2.73,2.73,0,0,0,1.65,2.51l2,.88A7.83,7.83,0,0,1,31,61.39Z"/></svg><h6><strong>23</strong> Parents</h6>
							</div><!--newparents-->
							<div class="newsitters">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.45 219.2"><defs><style>.a{fill:none;stroke-width:7px;}.a,.b{stroke:#bcb0c4;stroke-miterlimit:10;}.b{stroke-width:3px;}</style></defs><title>teddy</title><path class="a" d="M148.3,17C140,6.47,128.88-1.3,118.31,7A24.16,24.16,0,0,0,109.77,20c-2.73-1.69-5.41-3.24-7.93-4.63a34.56,34.56,0,0,0-33.26,0c-2.49,1.37-5.12,2.9-7.81,4.56a24.08,24.08,0,0,0-7-11.81C44-1,32.18,5.83,23,15.66s-12.19,19-2.37,28.09a24.21,24.21,0,0,0,9.63,5.5A25.54,25.54,0,0,0,27.78,60c0,10.78,7.89,20.8,17.83,29.15-9.09,1.82-20,8.08-29.53,17.67C.33,122.67.87,135.07,9.47,142.59c7.22,6.32,17.82,7.18,30.36-2.11a107.78,107.78,0,0,0-1,15.24,100.17,100.17,0,0,0-11.13,23.15c-4.52,13.27-5.57,23.81-4.14,31.83a6.06,6.06,0,0,0,6,5H58.41a6.07,6.07,0,0,0,5.42-3.34,91.36,91.36,0,0,0,4.81-11.65c.94-2.75,1.75-5.49,2.47-8.2H99.34c.71,2.71,1.53,5.45,2.47,8.2a91.36,91.36,0,0,0,4.81,11.65A6.07,6.07,0,0,0,112,215.7h28.84a6.08,6.08,0,0,0,6-5c1.43-8,.38-18.56-4.14-31.83a100.58,100.58,0,0,0-11.13-23.15,108,108,0,0,0-1-15.25c12.54,9.3,23.15,8.44,30.37,2.12,8.6-7.52,9.14-19.92-6.61-35.82-9.5-9.59-20.45-15.85-29.53-17.67,9.93-8.35,17.82-18.37,17.82-29.15a25.29,25.29,0,0,0-2.45-10.56,24,24,0,0,0,8.06-4.16C158.84,37,156.57,27.6,148.3,17Z"/><path class="b" d="M103.17,41.85a4.59,4.59,0,1,1-4.59,4.59A4.59,4.59,0,0,1,103.17,41.85Z"/><path class="b" d="M67.28,41.85a4.59,4.59,0,1,1-4.59,4.59A4.59,4.59,0,0,1,67.28,41.85Z"/><path class="a" d="M85.22,56.06c15.26,0,27.62,8,27.62,17.8,0,5.14-3.37,9.76-8.75,13a37,37,0,0,1-18.87,4.81,36.9,36.9,0,0,1-18.89-4.83C61,83.6,57.61,79,57.61,73.86,57.61,64,70,56.06,85.22,56.06Z"/><path d="M42.72,22.49a1.61,1.61,0,0,1,.39,0c1.85.48,3.16,3,4,7.06a87.51,87.51,0,0,0-7.76,7.05c-2.76-.76-5.57-2-6.15-3.85C32,29,39.73,22.49,42.72,22.49m0-7h0c-5.46,0-11.23,5.16-13.78,8.63-3.37,4.59-3.18,8.39-2.44,10.77,1.88,6,8.72,7.88,11,8.5l4,1.11,2.89-3A80.88,80.88,0,0,1,51.48,35l3.3-2.66L54,28.22a23.84,23.84,0,0,0-2.34-6.91,10.78,10.78,0,0,0-6.76-5.56,8.81,8.81,0,0,0-2.13-.26Z"/><path class="a" d="M95.84,168.65c-.25.09-.49.18-.74.25a35.5,35.5,0,0,1-19.76,0c-.25-.07-.49-.17-.73-.25A19.28,19.28,0,0,1,61.75,147.8a61.7,61.7,0,0,1,1.55-7.9c3.76-14.19,12.14-24.14,21.92-24.14s18.17,9.95,21.93,24.14a63.48,63.48,0,0,1,1.55,7.9A19.24,19.24,0,0,1,95.84,168.65Z"/><path d="M127.63,22.22c2.87,0,10.33,7.35,8.79,11.09-.65,1.59-3,2.55-5.5,3.12a88,88,0,0,0-8.14-7.31c1.17-4.13,2.7-6.56,4.61-6.88l.24,0m0-7h0a8.1,8.1,0,0,0-1.4.12c-7.16,1.2-9.44,9.23-10.19,11.87l-1.26,4.48,3.64,2.91a80.13,80.13,0,0,1,7.48,6.71l2.74,2.81,3.82-.87c5.46-1.23,9-3.69,10.44-7.29,1-2.46,1.48-6.48-2-11.68-2.1-3.13-7.57-9.06-13.27-9.06Z"/><path class="a" d="M98.92,73.15c0-4.88-6.13-8.83-13.7-8.83s-13.69,4-13.69,8.83S98.92,78,98.92,73.15Z"/></svg>
								<h6><strong>25</strong> Sitters</h6>
							</div><!--newsitters-->
							<div class="space"></div>
							<div class="statpercent">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="redarrow"><title>arrow-down</title><polygon points="17 13 23 13 12 24 1 13 7 13 7 0 17 0 17 13"/></svg><p class="statdown"><strong>Down 6% </strong>from previous week</p>
							</div><!--statpercent-->
						</div><!--rightside-->
					</div><!--contentcontain-->

						<a href="#" class="btn">View Full Report </a>

				</div><!--users-->
			</div><!--two section-->

			<div class="three-section">
				<div class="dashblock revenue">
					<h3 class="left">Revenue Generated</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
					<div class="bignum-reg"><sup>$</sup>24,632</div>
					<div class="statpercent">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="greenarrow"><title>arrow-up</title><polygon points="7 11 1 11 12 0 23 11 17 11 17 24 7 24 7 11"/></svg><p class="statup"><strong>Up 11% </strong>from previous week</p>
					</div><!--statpercent-->

					<a href="#" class="btn">View Full Report</a>
				</div><!--dashblock-->

				<div class="dashblock payments-com">
					<h3 class="left">Payments Completed</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
					<div class="paymentmethod">
					<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 18"><title>Artboard 3</title><path class="q" d="M22,0a2,2,0,0,1,1.41.59A2,2,0,0,1,24,2V16a2,2,0,0,1-2,2H2a2,2,0,0,1-1.41-.59A2,2,0,0,1,0,16V2A2,2,0,0,1,.59.59,2,2,0,0,1,2,0Zm1,8H1v8a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V8ZM8,13v1H3V13Zm13-2v1H18V11ZM11,11v1H3V11ZM1,5V7H23V5ZM23,4V2a1,1,0,0,0-1-1H2A1,1,0,0,0,1,2V4Z"/></svg>

					<h5><strong>85%</strong> $38,574.70</h5></div><!--payment method-->

					<div class="paymentmethod">
					<svg id="iconmonstr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.92 15.16"><defs><style>.cls-1{fill:none;stroke:#bcb0c4;stroke-miterlimit:10;stroke-width:0.75px;}.cls-2{fill:#bcb0c4;}</style></defs><title>cash</title><path class="cls-1" d="M14.78,6.94A3.32,3.32,0,0,0,11.37,5a1.85,1.85,0,0,0-1.44,2.7,3.31,3.31,0,0,0,3.6,1.87A1.85,1.85,0,0,0,14.78,6.94Z"/><path class="cls-2" d="M13.09,8.52l.12.27L13,8.84l-.11-.25a2.17,2.17,0,0,1-.84,0l-.08-.46a2.25,2.25,0,0,0,.73,0l.14-.05c.26-.13.18-.45-.2-.53s-1,0-1.32-.64A.63.63,0,0,1,11.69,6l-.12-.28.25,0,.12.27a2.78,2.78,0,0,1,.66,0l.1.44a2.42,2.42,0,0,0-.6,0l-.07,0c-.36.1-.24.44.08.52.52.12,1.15.16,1.4.71A.62.62,0,0,1,13.09,8.52Z"/><path class="cls-1" d="M20.29.55C13.46,5,5.91.2.45,5.47l4.16,9.08c5.86-5,13.84-.26,19.84-4.92Z"/></svg>
					<h5><strong>15%</strong> $6,807.30</h5></div><!--payment method-->
					<div class="statpercent">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="greenarrow"><title>arrow-up</title><polygon points="7 11 1 11 12 0 23 11 17 11 17 24 7 24 7 11"/></svg><p class="statup"><strong>Up 11% </strong>from previous week</p>
					</div><!--statpercent-->

					<a href="#" class="btn">View Full Report</a>
				</div><!--dashblock-->

				<div class="dashblock newbookings">
					<h3 class="left">New Bookings</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
					<div class="bignum-reg">35</div>
					<div class="statpercent">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="redarrow"><title>arrow-down</title><polygon points="17 13 23 13 12 24 1 13 7 13 7 0 17 0 17 13"/></svg><p class="statdown"><strong>Down 13% </strong>from previous week</p>
					</div><!--statpercent-->

					<a href="#" class="btn">View Full Report</a>
				</div><!--dashblock-->
			</div><!--three section-->


			<div class="two-section">
				<div class="dashblock reviews">
					<h3 class="left">Recent Reviews</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
						<div class="blockcontain">
						<div class="block-content">
							<div class="img-wrapper">
								<img class="circle-clip" src="images/profileimg.jpg" alt="profile image"/>
							</div>
							<div class="r-info">
								<h5>Janet Wellsmith</h5>
								<div class="starrr"></div>
								<p>by: <a href="#">Lauren Jones</a> | 11/30/18</p>
								<a href="#" class="btn-outline"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22"><defs></defs><title>Artboard 3</title><path class="vvv" d="M7.07,20.59,0,22l1.41-7.07L16.34,0,22,5.66c-4,4-10.92,10.92-14.93,14.93Zm-.49-.92L2.34,15.42,1.27,20.73l5.31-1.06ZM16.34,1.41,3,14.71,7.29,19l13.3-13.3L16.34,1.41Z"/></svg>Edit</a>
							</div>
						</div>

						<div class="block-content">
							<div class="img-wrapper">
								<img class="circle-clip" src="images/profileimg.jpg" alt="profile image"/>
							</div>
							<div class="r-info">
								<h5>Janet Wellsmith</h5>
								<div class="starrr"></div>
								<p>by: <a href="#">Lauren Jones</a> | 11/30/18</p>
								<a href="#" class="btn-outline"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22"><defs></defs><title>Artboard 3</title><path class="vvv" d="M7.07,20.59,0,22l1.41-7.07L16.34,0,22,5.66c-4,4-10.92,10.92-14.93,14.93Zm-.49-.92L2.34,15.42,1.27,20.73l5.31-1.06ZM16.34,1.41,3,14.71,7.29,19l13.3-13.3L16.34,1.41Z"/></svg>Edit</a>
							</div>
						</div>
					</div><!--blockcontain-->


						<a href="#" class="btn">View Full Report</a>

				</div><!--reviews-->



				<div class="dashblock premium">
					<h3 class="left">Premium Upgrades</h3>
						<h4 class="right filter-btn">This Week <i class="im im-care-down"></i></h4>
						<div class="filter-dropdown">
							<button>This Week</button>
							<button>This Month</button>
							<button>This Quarter</button>
						</div><!--filter-dropdown-->
						<hr>
						<div class="blockcontain">
							<div class="bignum">18</div>
							<div class="rightside">
								<div class="bg-content">
								<img src="images/check.png" alt="checkmark"/><h5>10 Background Checks Complete</h5></div>
								<div class="bg-content">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.25 24.25"><defs><style>.aa{fill:#1f1844;}.bb{fill:#bcb0c4;}</style></defs><title>Artboard 3</title><path class="aa" d="M14.73,7.32h0a6.39,6.39,0,0,0,1.52-4.11V0H0V3.21A6.39,6.39,0,0,0,1.52,7.32L4.6,11a1.66,1.66,0,0,1,0,2.15L1.48,16.94A6.47,6.47,0,0,0,0,21v3.23H16.25V21a6.47,6.47,0,0,0-1.48-4.08l-3.13-3.79a1.66,1.66,0,0,1,0-2.15Zm-3.67,6.31,3.13,3.79a5.68,5.68,0,0,1,1.31,3.7V23.5H.75V21.12a5.66,5.66,0,0,1,1.31-3.7l3.13-3.79a2.44,2.44,0,0,0,0-3.11L2.09,6.84A5.68,5.68,0,0,1,.75,3.12V.75H15.5V3.12a5.7,5.7,0,0,1-1.34,3.72l-3.09,3.68A2.44,2.44,0,0,0,11.06,13.63Z"/><polygon class="bb" points="2.13 21.13 2.13 22.13 14.13 22.13 14.13 21.13 8.13 20.21 2.13 21.13"/><path class="bb" d="M8.12,11.26l5-5.61a4.25,4.25,0,0,0,1-2.83h-12a4.28,4.28,0,0,0,1,2.83Z"/></svg><h5>8 Background Checks In Progress</h5></div>
								<div class="statpercent">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="greenarrow"><title>arrow-up</title><polygon points="7 11 1 11 12 0 23 11 17 11 17 24 7 24 7 11"/></svg><p class="statup"><strong>Up 11% </strong>from previous week</p>
								</div><!--statpercent-->
							</div><!--rightside-->
						</div><!--blockcontain-->

						<a href="#" class="btn">View Full Report</a>

				</div><!--reviews-->
			</div><!--two section-->

		</div>

	</div>

	<footer>
	<p class="container">&copy; 2018 Kingdom Care, LLC. All Rights Reserved
		<a  class="space1" href=""></a>
		<a href=""> Terms of Service</a> | <a href="">Privacy Policy</a>
	</p>

	</footer>


	<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );


var my_calendar = $("#dncalendar-container").dnCalendar({
    dataTitles: { defaultDate: 'default', today : 'Today' },
    dayUseShortName: true,
    notes: [
      { "date": "2019-8-2", "note": ["Merry Christmas 2015"] },
      { "date": "2015-12-31", "note": ["Happy New Year 2016"] }
      ],
    // showNotes: true,
});




my_calendar.build();

$(".note").on("click", function(){
 	$(".calendar").append('<div class="cal-pop"> <h3>8/23/19</h3><p>Janet is scheduled to watch Johnny at 3pm</p><a href="#">View Details</a></div>');

 });

$(document).mouseup(function(e){
    $(".cal-pop").hide();
});

$(".starrr").starrr({
	readOnly: true,
	rating: 4
});


$(".filter-btn").click(function(){
	$(this).next(".filter-dropdown").addClass("show");
})



// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.filter-btn')) {
    var dropdowns = document.getElementsByClassName("filter-dropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}




  </script>


</body>
</html>
