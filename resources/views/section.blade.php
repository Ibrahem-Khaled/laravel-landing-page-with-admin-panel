<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>dajor - {{ __('messages.about_us') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="صالون تجميل دار ديجور" />
    <meta name="author" content="dar dajor" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Cairo", sans-serif;
            font-optical-sizing: auto;
            font-weight: normal;
            font-style: normal;
            font-variation-settings: "slnt" 0;
            background-color: #d0d0d0
        }

        .about-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .about-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
            color: #343a40;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            color: #6c757d;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .about-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 2rem 0;
        }
    </style>

</head>

<body>

    @include('homeLayouts.nav')

    <section class="about-section">
        <div class="container">
            <h2 class="about-title">{{ $section->name }}</h2>
            <p class="about-content">
                {{ $section->description }}
            </p>
            <img src="https://via.placeholder.com/800x400" alt="{{ __('messages.about_us') }}" class="about-image">
        </div>
    </section>

    @include('homeLayouts.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <a href="https://wa.me/YOUR_NUMBER_HERE" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>

</html>
