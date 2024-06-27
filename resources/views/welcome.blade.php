<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    More Templates Visit ==> Free-Template.co
    -->
    <title>dajor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free Template by Free-Template.co" />
    <meta name="author" content="dar dajor" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Cairo", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-variation-settings:
                "slnt" 0;
        }

        .ftco-heading {
            font-size: 3rem;
            font-weight: bold;
            color: #d4af37;
            /* Gold color */
        }

        .ftco-subheading {
            font-size: 1.5rem;
            font-weight: normal;
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
            color: #d4af37;
            /* Gold color */
        }
    </style>

</head>

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

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
                    <li class="nav-item active"><a href="#section-home" class="nav-link">Home</a></li>
                    <!-- Language Switch Links -->
                    <li class="nav-item"><a href="{{ route('lang.switch', 'en') }}" class="nav-link">English</a></li>
                    <li class="nav-item"><a href="{{ route('lang.switch', 'ar') }}" class="nav-link">عربي</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- END nav -->

    <section class="ftco-cover ftco-slant"
        style="background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.6oAQ1cbv7hh4RUOCIOCubwHaJQ%26pid%3DApi&f=1&ipt=eae6dfc0d9221d35074ff2a85202b010243e79492a552813159669e2b9a7e02e&ipo=images');"
        id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center ftco-vh-100">
                <div class="col-md-10">
                    <img src="{{ asset('logo.png') }}" height="250" alt="logo">
                    <h2 class="h5 ftco-subheading mb-5 ftco-animate">مكان يليق بك</h2>
                    <h3 class="company-profile ftco-animate">COMPANY PROFILE</h3>
                    <h4 class="since-1997 ftco-animate">SINCE 1997</h4>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-slant ftco-slant-light  bg-light ftco-slant ftco-slant-white" id="section-faq">
        @foreach ($sectionsNotImage as $item)
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12 text-center ftco-animate">
                        <h2 class="text-uppercase ftco-uppercase">{{ $item->name }}</h2>
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-7">
                                <p class="lead">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="ftco-section ftco-slant ftco-slant-light" id="section-about">
        <div class="container">
            @foreach ($sectionsWithImage as $index => $item)
                <div class="row no-gutters align-items-center ftco-animate" style="margin-vertical: 10px">
                    <div class="col-md-6 mb-md-0 mb-5 {{ $index % 2 == 0 ? 'order-md-3' : '' }}">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid"
                            style="margin: 5px;border-radius: 10px">
                    </div>
                    <div class="col-md-6 p-md-5">
                        <h3 class="h3 mb-4">{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="ftco-section bg-light ftco-slant ftco-slant-white" id="section-counter">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center ftco-animate">
                    <h2 class="text-uppercase ftco-uppercase">Fun Facts</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-7">
                            <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia
                                and Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END row -->
            <div class="row">
                <div class="col-md ftco-animate">
                    <div class="ftco-counter text-center">
                        <span class="ftco-number" data-number="34146">0</span>
                        <span class="ftco-label">Lines of Codes</span>
                    </div>
                </div>
                <div class="col-md ftco-animate">
                    <div class="ftco-counter text-center">
                        <span class="ftco-number" data-number="1239">0</span>
                        <span class="ftco-label">Pizza Consume</span>
                    </div>
                </div>
                <div class="col-md ftco-animate">
                    <div class="ftco-counter text-center">
                        <span class="ftco-number" data-number="124">0</span>
                        <span class="ftco-label">Number of Clients</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="ftco-section bg-white ftco-slant ftco-slant-dark" id="section-contact">
        <div class="container">
            <div class="row">

                <div class="col-md pr-md-5 mb-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="email"
                                placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                placeholder="Write your message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Send Message">
                        </div>
                    </form>
                </div>
                <div class="col-md" id="map">
                </div>
            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-bg-dark">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Company</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">About</a></li>
                                    <li><a href="#" class="py-2 d-block">Jobs</a></li>
                                    <li><a href="#" class="py-2 d-block">Press</a></li>
                                    <li><a href="#" class="py-2 d-block">News</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Communities</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">Support</a></li>
                                    <li><a href="#" class="py-2 d-block">Sharing is Caring</a></li>
                                    <li><a href="#" class="py-2 d-block">Better Web</a></li>
                                    <li><a href="#" class="py-2 d-block">Good Template</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Useful links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">Bootstrap 4</a></li>
                                    <li><a href="#" class="py-2 d-block">jQuery</a></li>
                                    <li><a href="#" class="py-2 d-block">HTML5</a></li>
                                    <li><a href="#" class="py-2 d-block">Sass</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md text-left">
                    <p>&copy; Exclusivity 2017. All Rights Reserved. Made with <span
                            class="icon-heart text-danger"></span> by <a
                            href="https://free-template.co/">Free-Template.co</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#4586ff" />
        </svg></div>


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
