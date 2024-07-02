@php
    $otherPages = \App\Models\User::where('role', 'page')->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('logo2.png') }}" width="100" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"
                        style="color: black">{{ __('messages.home') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('messages.branches') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($branches as $branch)
                            <a class="dropdown-item" href="{{ route('branch', $branch->id) }}">{{ $branch->name }}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('messages.other_pages') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($otherPages as $branch)
                            <a class="dropdown-item" href="{{ route('branch', $branch->id) }}">{{ $branch->name }}</a>
                        @endforeach
                    </div>
                </li>
                @foreach ($sectionsNotImage as $item)
                    <li class="nav-item active"><a style="color: black" href="{{ route('section', $item->id) }}"
                            class="nav-link">{{ $item->name }}</a></li>
                @endforeach
                <!-- Language Switch Links -->
                <li class="nav-item"><a style="color: black" href="{{ route('lang.switch', 'en') }}"
                        class="nav-link">{{ __('messages.english') }}</a></li>
                <li class="nav-item"><a style="color: black" href="{{ route('lang.switch', 'ar') }}"
                        class="nav-link">{{ __('messages.arabic') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
