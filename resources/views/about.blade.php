@php
    $tentangkami = get_tentangkami_data();
    $keunggulankami = get_keunggulankami_data();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tentang Kami - Internet Rakyat</title>
</head>

<body class="pricing-page">
    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <main class="main">
        <!-- About Section -->
        <section id="about" class="about section light-background">

            <div class="container">

                <div class="row gy-4">
                    @if ($tentangkami)
                        <div class="col-lg-5 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ Storage::url($tentangkami->image_url) }}" class="img-fluid" alt="">
                            {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> --}}
                        </div>

                        <div class="col-lg-7 content" data-aos="fade-up" data-aos-delay="100">

                            <h3>{{ $tentangkami->title }}</h3>
                            <p>
                                {!! nl2br($tentangkami->description) !!}
                            </p>
                        @else
                            <h2>Tentangkami tidak ditemukan</h2>
                    @endif

                    @if ($keunggulankami->isNotEmpty())
                        @foreach ($keunggulankami as $item)
                            <ul>
                                <li>
                                    <i class="{{ $item->icon }}"></i>
                                    <div>
                                        <h5>{{ $item->title }}</h5>
                                        <p>{!! strip_tags($item->description) !!} </p>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <p>Tidak ada data tersedia.</p>
                    @endif
                </div>

            </div>

            </div>

        </section><!-- /About Section -->

    </main>
    <!-- /Pricing Section -->
    <!-- ======= Footer ======= -->
    @include('footer')
    <!-- End Footer -->
</body>

</html>
