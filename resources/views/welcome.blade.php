<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ $siteSetting ? $siteSetting->title : 'dar dajor' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content={{ $siteSetting ? $siteSetting->description : 'صالون تجميل دار ديجور' }} />
    <meta name="author" content={{ $siteSetting ? $siteSetting->title : 'dar dajor' }} />

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
            font-variation-settings:
                "slnt" 0;
            background-color: #d0d0d0
        }

        .ftco-cover {
            position: relative;
            overflow: hidden;
        }

        .background-blur {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url({{ asset($siteSetting ? $siteSetting->image : 'images/background.jpeg') }});
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .ftco-vh-100 {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .ftco-cover img,
        .ftco-cover h3,
        .ftco-cover h4 {
            position: relative;
            z-index: 2;
            color: #fff;
        }

        .company-profile {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 20px;
            color: #fff;
        }

        .since-1997 {
            font-size: 1rem;
            font-weight: normal;
            margin-top: 10px;
            color: #fff;
        }

        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .whatsapp-float i {
            margin-top: 16px;
        }

        .ftco-section img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
        }

        .ftco-section .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }
    </style>

</head>

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

    @include('homeLayouts.nav')

    <section class="ftco-cover ftco-slant" id="section-home">
        <div class="background-blur"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center text-center ftco-vh-100">
                <div class="col-md-10">
                    {{-- <img src="{{ asset('logo.png') }}" height="250" alt="logo"> --}}
                    {{-- <h3 class="company-profile ftco-animate">{{ __('messages.company_profile') }}</h3>
                    <h4 class="since-1997 ftco-animate">{{ __('messages.since_1997') }}</h4> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-slant ftco-slant-light" id="section-services">
        <h2 class="text-center mb-5">{{ __('messages.our_services') }}</h2>
        <img src="{{ asset('images/ourService.jpeg') }}" alt="background" class="img-fluid rounded "
            style="object-fit: contain">
        <div class="container">
            @foreach ($sectionsWithImage as $index => $item)
                <div class="row align-items-center ftco-animate mb-5">
                    <div class="col-md-6 {{ $index % 2 == 0 ? 'order-md-2' : '' }}">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 text-container {{ $index % 2 == 0 ? 'order-md-1' : '' }}">
                        <h3 class="h3 mb-4">{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- <div class="row w-100">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115681.29592731265!2d-77.47713270775661!3d25.0326996781907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x892f7c99b981dbc9%3A0x2aef01d3485e50d2!2sNassau%2C%20Bahamy!5e0!3m2!1spl!2spl!4v1624445118063!5m2!1spl!2spl"
            class="w-100" height="600" allowfullscreen="" loading="lazy"></iframe>
    </div> --}}

    <section class="ftco-section bg-white ftco-slant ftco-slant-dark" id="section-contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-4">{{ __('messages.contact_us') }}</h2>
                    <p>{{ __('messages.booking_prompt') }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <a href="booking.html" class="btn btn-primary py-3 px-5">{{ __('messages.book_now') }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-slant ftco-slant-light" id="section-about">
        <div class="container">
            <div class="row justify-content-center mb-5">
                @foreach ($gallarys as $item)
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}"
                        class="img-fluid rounded mb-4" style="border-radius: 10px;">
                @endforeach
            </div>
        </div>
    </section>

    @include('homeLayouts.footer')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#4586ff" />
        </svg>
    </div>

    <a href="https://wa.me/YOUR_NUMBER_HERE" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

</body>

</html>
