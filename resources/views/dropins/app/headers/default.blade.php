<header>
    <nav>
        <div class="container">
            <h1><a href="{{ route('index') }}">@include('dropins/svg/logo')</a></h1>

            @if (Auth::user()->hasRole('admin'))
                @include('dropins.app.navs.admin')
            @elseif (Auth::user()->hasRole('sitter'))
                @include('dropins.app.navs.admin')
            @elseif (Auth::user()->hasRole('parent'))
                @include('dropins.app.navs.admin')
            @endif
        </div>
    </nav>
</header>
