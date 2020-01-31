<div id="myNav" class="overlay">
    <a href=""><img src="{{ asset('images/logo.svg') }}" class="hamlogo" alt="hamburger menu" /></a>
    <a href="javascript:void(0)" class="closebtn">&times;</a>

    <div class="overlay-content-top">
        <a href=""><img class="somepadding" src="images/mock-photo.png" alt="profile picture"/></a>
    </div>

    <div class="overlay-content">
        <a href="calendar.html">Users</a>
        <a href="booking.html">Bookings</a>
        <a href="payments.html">User Payments</a>
        <a href="reviews.html">Background Checks</a>
        <a href="support.html">Revenue</a>
        <a href="support.html">Reviews</a>
        <a href="{{ route('logout') }}" class="logout-link">Logout</a>
    </div>
</div>

<span id="ham" style="font-size:30px;cursor:pointer">&#9776;</span>

<div class="nav-left">
    <div class="nav-top">
        <a href="#"><img class="somepadding" src="images/mock-photo.png" alt="profile picture"/></a>
        <a href="" class="btn btn-logout somepadding logout-link"><i class="im im-sign-out"></i><span class="text">Logout</span></a>
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
