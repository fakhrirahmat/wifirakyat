@php
    $infopaket = get_infopaket_data('');
    $judulpaket = get_judulpaket_data('');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Paket Internet - Internet Rakyat</title>
</head>

<body class="pricing-page">

    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <main class="main">

        <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                @if ($judulpaket)
                    <h2>{{ $judulpaket->title }}</h2>
                    <p>{!! strip_tags($judulpaket->description) !!}</p>
                @else
                    <h2>Jumbotron tidak ditemukan</h2>
                @endif
                {{-- <h2>Paket Internet</h2>
                
                <p>Hemat Besar Mulai Rp. 100.000/bln - Gaming & Streaming Lancar Tanpa Lag</p> --}}

            </div><!-- End Section Title -->
            @if ($infopaket->isNotEmpty())
                <div class="container">

                    <div class="row gy-3">
                        @foreach ($infopaket as $item)
                            <div class="col-xl-4 col-lg-6" data-aos="fade-up"
                                data-aos-delay="{{ $loop->index * 100 + 100 }}">
                                <div class="pricing-item {{ $loop->first ? 'featured' : '' }}">
                                    <h3>{{ $item->title }}</h3>
                                    <h4><sup>Rp.</sup>{{ $item->pricing }}<span> /bulan</span></h4>
                                    <ul>
                                        <li>{!! nl2br($item->description) !!}</li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Langganan</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- End Pricing Item -->

                </div>
            @endif
        </section><!-- /Pricing Section -->

    </main>

    <!-- ======= Footer ======= -->
    @include('footer')
    <!-- End Footer -->
</body>

</html>
