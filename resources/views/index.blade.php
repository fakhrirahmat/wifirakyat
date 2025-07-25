@php
    $jumbotron = get_jumbotron_data('Tagline1');
    $jumbotron2 = get_jumbotron_data('Tagline2');
    $jumbotron3 = get_jumbotron_data('Tagline3');
    $sponsors = get_sponsors();
    $alasan = get_alasan_data();
    $promotion = get_promotion_data();
    $installation = get_installation_data();
    $infopromo = get_infopromo_data();
    $testimoni = get_testimoni_data();
    $infopaket = get_infopaket_data('')->firstWhere('id', 1);
    $setting = get_setting_data();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beranda - Internet Rakyat</title>
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('assets/img/hero-bg.jpeg') }}" alt="" data-aos="fade-in">

            <div class="container position-relative">

                <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                    @if ($jumbotron)
                        <h2>{{ $jumbotron->title }}</h2>
                        <p>{!! strip_tags($jumbotron->description) !!}</p>
                    @else
                        <h2>Jumbotron tidak ditemukan</h2>
                    @endif
                </div><!-- End Welcome -->

                <div class="content row gy-4">
                    @foreach ($promotion as $item)
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                                <h3>{{ $item->title }}</h3>
                                <p>{!! strip_tags($item->description) !!}</p>
                                <div class="mt-4 text-center">
                                    <button onclick="window.location.href='{{ route('daftar') }}'" class="btn btn-dark">
                                        {{ $item->nama_tombol }}
                                    </button>
                                </div>
                            </div>
                        </div><!-- End Why Box -->
                    @endforeach

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="row gy-4">
                                @if ($alasan->isNotEmpty())
                                    @foreach ($alasan as $item)
                                        <div class="col-xl-4 d-flex align-items-stretch">

                                            <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                                <i class="{{ $item->icon }}"></i>
                                                {{-- <i class="{!! strip_tags($alasans->icon) !!}"></i> --}}
                                                <h4>{{ $item->title }}</h4>
                                                <p>{!! strip_tags($item->description) !!}</p>
                                            </div>

                                        </div><!-- End Icon Box -->
                                    @endforeach
                                @else
                                    <p>Tidak ada data tersedia.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div><!-- End  Content-->

            </div>

        </section><!-- /Hero Section -->



        @if ($sponsors->isNotEmpty())
            <section id="clients" class="clients section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": { "slidesPerView": 2, "spaceBetween": 40 },
                            "480": { "slidesPerView": 3, "spaceBetween": 60 },
                            "640": { "slidesPerView": 4, "spaceBetween": 80 },
                            "992": { "slidesPerView": 6, "spaceBetween": 120 }
                        }
                    }
                    </script>

                        <div class="swiper-wrapper align-items-center">
                            @foreach ($sponsors as $item)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::url($item->logo) }}" class="img-fluid" alt="Sponsor Logo">
                                </div>
                            @endforeach
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif


        <!-- Services Section -->
        <section id="services" class="services section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                @if ($jumbotron2)
                    <h2>{{ $jumbotron2->title }}</h2>
                    <p>{!! strip_tags($jumbotron2->description) !!}</p>
                @else
                    <h2>Judul tidak tersedia</h2>
                @endif
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @if ($installation->isNotEmpty())
                        @foreach ($installation as $item)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">

                                <div class="service-item  position-relative">
                                    <div class="icon">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                    <a href="{{ route('daftar') }}" class="stretched-link">
                                        <h3>{{ $item->title }}</h3>
                                    </a>
                                    <p>{!! strip_tags($item->description) !!} </p>
                                </div>

                            </div><!-- End Service Item -->
                        @endforeach
                    @else
                        <p>Tidak ada data tersedia.</p>
                    @endif

                </div>
            </div>
        </section><!-- /Services Section -->

        <section id="internet-promo" class="internet-promo section">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="promo-content">

                    @if ($infopromo)
                        <h2> {{ $infopromo->title }} </h2>
                        <p>{!! strip_tags($infopromo->description) !!}</p>
                    @else
                        <h2>data infopromo tidak ditemukan</h2>
                    @endif

                    @if ($infopaket)
                        <p class="price">Rp. <span class="highlight">{{ $infopaket->pricing }}</span> / Bulan</p>
                    @else
                        <p class="price">Paket tidak ditemukan</p>
                    @endif

                    @if ($setting)
                        <a class="btn btn-promo" href="{{ route('daftar') }}">
                            Berlangganan Sekarang!
                        </a>
                    @else
                        <h2>data setting tidak ditemukan</h2>
                    @endif
                </div>
                <div class="promo-image">
                    @if ($infopromo)
                        <div class="container">
                            <img src="{{ Storage::url($infopromo->image_url) }} " alt="Promo Internet"
                                class="img-fluid">
                        @else
                            <h2>data infopromo tidak ditemukan</h2>
                    @endif
                </div>
            </div>
            </div>
        </section>

        @if ($testimoni->isNotEmpty())
            <section id="testimonials" class="testimonials section dark-background">
                <img src="{{ asset('assets/img/testimonials-bg.jpg') }}" class="testimonials-bg" alt="">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    }
                  }
                </script>
                        <div class="swiper-wrapper">
                            @foreach ($testimoni as $item)
                                <div class="swiper-slide">

                                    <div class="testimonial-item">
                                        <img src="{{ Storage::url($item->image_url) }}" class="testimonial-img"
                                            alt="">
                                        <h3>{{ $item->nama }}</h3>
                                        <h4>{{ $item->jabatan }}</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>{!! strip_tags($item->pesan) !!}</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>

                                </div><!-- End testimonial item -->
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section><!-- /Testimonials Section -->
        @endif

    </main>

    <!-- ======= Footer ======= -->
    @include('footer')
    <!-- End Footer -->

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Re-init AOS
                    AOS.refresh();

                    // Re-init Swiper jika perlu
                    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
                        if (!swiperElement.classList.contains('swiper-initialized')) {
                            let configElement = swiperElement.querySelector(".swiper-config");
                            if (configElement) {
                                let config = JSON.parse(configElement.innerHTML.trim());
                                new Swiper(swiperElement, config);
                            }
                        }
                    });
                }
            });
        }, {
            threshold: 0.1
        });

        // Observe testimoni dan section lainnya
        document.querySelectorAll('#testimonials, #services').forEach(section => {
            observer.observe(section);
        });
    </script>



</body>

</html>
