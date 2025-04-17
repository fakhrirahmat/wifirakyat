@php
    $setting = get_setting_data();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kontak - Internet Rakyat</title>
</head>

<body class="pricing-page">

    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <main class="main">

        @if ($setting)
            <!-- Contact Section -->
            <section id="contact" class="contact section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Kontak</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">

                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                                <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>{!! strip_tags($setting->alamat) !!}</p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <i class="icon bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3 href="{{ $setting->whatsapp_url }}">WhatsApp</h3>
                                    <p href="{{ $setting->whatsapp_url }}">{{ $setting->phone }}</p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                                <i class="icon bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email</h3>
                                    <p>{{ $setting->email }}</p>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                                <i class="icon bi bi-share flex-shrink-0"></i>
                                <div>
                                    <h3>Media Sosial</h3>
                                    <div class="social-links">
                                        {{-- <a href="#"><i class="bi bi-twitter-x"></i></a> --}}
                                        <a href="{{ $setting->facebook_url }}"><i class="bi bi-facebook"></i></a>
                                        <a href="{{ $setting->instagram_url }}"><i class="bi bi-instagram"></i></a>
                                        {{-- <a href="#"><i class="bi bi-skype"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Info Item -->

                    </div>
                </div>

            </section><!-- /Contact Section -->
        @else
            <h2>data tidak ditemukan</h2>
        @endif

    </main>

    <!-- ======= Footer ======= -->
    @include('footer')
    <!-- End Footer -->

</body>

</html>
