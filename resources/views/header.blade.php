@php
    $setting = get_setting_data();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    {{-- @if ($setting) --}}
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    {{-- @else
        <h2>icon tidak ditemukan</h2>
    @endif --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Flexor
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>



<body class="index-page">
    <header id="header" class="header sticky-top">

        @if ($setting)
            <div class="topbar d-flex align-items-center dark-background">
                <div class="container d-flex justify-content-center">
                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-person-plus d-flex align-items-center"><a
                                href="{{ $setting->whatsapp_url }}">Berlangganan Sekarang!</a></i>
                        <i class="bi bi bi-telephone-forward d-flex align-items-center ms-4"><a
                                href="{{ $setting->whatsapp_url }}">{{ $setting->phone }}</a></i>
                    </div>
                    <div class="social-links d-none d-md-flex align-items-center">
                        {{-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a> --}}
                        {{-- <a href="https://wa.me/6287851940788" class="btn-getstarted"><span style="color:darkorange">Langganan Sekarang</span> <i class="bi bi-chevron-right"></i></a> --}}

                        {{-- <a href="https://www.facebook.com/profile.php?id=61567392779464" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> --}}
                        {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
                    </div>
                </div>
            </div><!-- End Top Bar -->

            <div class="branding d-flex align-items-cente">

                <div class="container position-relative d-flex align-items-center justify-content-between">
                    <a href="/index" class="logo d-flex align-items-center">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        <img src="{{ Storage::url($setting->icon) }}" alt="">
                        <h1 class="sitename">{{ $setting->judul_situs }}</h1>
                    </a>

                    <nav id="navmenu" class="navmenu">
                        <ul>
                            <li><a href="/index" class="{{ Request::is('index') ? 'active' : '' }}">Beranda<br></a>
                            </li>
                            <li><a href="/pricing" class="{{ Request::is('pricing') ? 'active' : '' }}">Paket
                                    Internet</a>
                            </li>
                            <li><a href="/faq" class="{{ Request::is('faq') ? 'active' : '' }}">FAQ</a></li>
                            <li><a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">Tentang Kami</a>
                            </li>

                            <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Kontak</a></li>
                        </ul>
                        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                    </nav>

                </div>

            </div>
        @else
            <h2>data setting tidak ditemukan</h2>
        @endif

    </header>
</body>

</html>
