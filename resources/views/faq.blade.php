@php
    $faq = get_faq_data();
    $judulfaq = get_judulfaq_data();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>FAQ - Internet Rakyat</title>
</head>

<body class="pricing-page">

    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <main class="main">
        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">
            <!-- Section Title -->
            @if ($judulfaq)
                <div class="container section-title" data-aos="fade-up">
                    <h4 style="color:coral">{{ $judulfaq->title }}</h4>
                    <h1 style="font-weight: bold">{!! strip_tags($judulfaq->description) !!}</h1>
                    <p>{!! strip_tags($judulfaq->isi) !!}</p>
                </div><!-- End Section Title -->
            @else
                <p class="price">Judul faq tidak ditemukan</p>
            @endif

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @if ($faq->isNotEmpty())
                            <div class="faq-container">
                                @foreach ($faq as $item)
                                    <div class="faq-item {{ $loop->first ? 'faq-active' : '' }}" data-aos="fade-up"
                                        data-aos-delay="{{ $loop->index * 100 + 200 }}">
                                        <i class="faq-icon bi bi-question-circle"></i>
                                        <h3>{{ $item->title }}</h3>
                                        <div class="faq-content {{ $loop->first ? 'show' : '' }}">
                                            <p>{!! strip_tags($item->description) !!}</p>
                                        </div>
                                        <i class="faq-toggle bi bi-chevron-right"></i>
                                    </div><!-- End Faq item-->
                                @endforeach
                            </div>
                        @else
                            <p>Tidak ada data FAQ yang tersedia saat ini.</p>
                        @endif
                    </div>
                </div>
            </div>

        </section><!-- /Faq Section -->

    </main>

    <!-- ======= Footer ======= -->
    @include('footer')
    <!-- End Footer -->

</body>

</html>
