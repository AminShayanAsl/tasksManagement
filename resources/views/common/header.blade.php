<header class="px-4 py-3 border-bottom fixed-top bg-light">
    <a href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" class="float-start" style="width: 250px;">
    </a>

    @if(auth()->check())
        <a href="{{ route('logout') }}" class="btn btn-outline-danger">
            {{ __('user.logout') }}
        </a>

        <strong class="mx-2">{{ $username }}</strong>
    @else
        <a href="{{ route('user-account') }}" class="btn btn-outline-primary">
            {{ __('user.login') }} - {{ __('user.signup') }}
        </a>
    @endif
</header>
