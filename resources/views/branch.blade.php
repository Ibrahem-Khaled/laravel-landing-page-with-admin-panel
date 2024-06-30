<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Branch Info - Dajor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Branch Information for Dajor" />
    <meta name="author" content="Dajor" />

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
            background-color: #d0d0d0 color: #333;
        }


        .ftco-cover {
            position: relative;
            overflow: hidden;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background: url('{{ asset($branch->image ? 'images/' . $branch->image : 'images/background.jpeg') }}') no-repeat center center;
            background-size: cover;
        }

        .ftco-cover h3,
        .ftco-cover h4 {
            margin: 0;
            padding: 10px;
        }

        .company-profile {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .since-1997 {
            font-size: 1.2rem;
            font-weight: normal;
            margin-top: 10px;
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

        .ftco-section {
            padding: 60px 0;
        }

        .ftco-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .ftco-section p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn-primary,
        .btn-secondary {
            font-size: 1rem;
            padding: 15px 30px;
            border-radius: 50px;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color: #ed0f7d;
            border: none;
        }

        .btn-secondary {
            background-color: #333;
            border: none;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

    @include('homeLayouts.nav')

    <!-- Branch Info Section -->
    <section class="ftco-cover ftco-slant" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center ftco-vh-100">
                <div class="col-md-10">
                    {{-- <img src="{{ asset('logo.png') }}" height="250" alt="logo">
                    <h3 class="company-profile ftco-animate">{{ __('messages.company_profile') }}</h3>
                    <h4 class="since-1997 ftco-animate">{{ __('messages.since_1997') }}</h4> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="ftco-section ftco-slant ftco-slant-light" id="section-booking">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2>{{ __('messages.book_now') }}</h2>
                    <p>{{ __('messages.booking_prompt') }}</p>
                    <a href="{{ $branch->booking_link }}}" class="btn btn-primary">{{ __('messages.book_now') }}</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="ftco-section bg-white ftco-slant ftco-slant-dark" id="section-map">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <h2>{{ $branch->address }}</h2>
                    <p>{{ $branch->description }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115681.29592731265!2d-77.47713270775661!3d25.0326996781907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x892f7c99b981dbc9%3A0x2aef01d3485e50d2!2sNassau%2C%20Bahamy!5e0!3m2!1spl!2spl!4v1624445118063!5m2!1spl!2spl"
                        class="w-100" height="600" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="ftco-section ftco-slant ftco-slant-light" id="section-contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2>{{ __('messages.contact_us') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <a href="mailto:info@dajor.com" class="btn btn-primary">{{ $branch->email }}</a>
                    <a href="tel:+1234567890" class="btn btn-secondary">{{ $branch->phone }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-white ftco-slant ftco-slant-dark" id="section-map">
        <div class="container">
            @foreach ($gallarys as $item)
                <img src="{{ asset('images/' . $item->image) }}" width="100%" height="350" class="rounded"
                    style="object-fit: contain">
            @endforeach
        </div>
    </section>

    @include('homeLayouts.footer')

    <!-- Loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#4586ff" />
        </svg>
    </div>

    <a href="https://wa.me/{{ $branch->phone }}" class="whatsapp-float" target="_blank">
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
