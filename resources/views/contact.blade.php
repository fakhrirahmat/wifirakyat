@php
    $setting = get_setting_data();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Internet Rakyat</title>
    <meta name="description"
        content="Hubungi Internet Rakyat melalui alamat, email, WhatsApp, atau formulir pengaduan. Kami siap membantu Anda.">
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
                    <p>Kami di Sini untuk Anda – Hubungi Sekarang !!</p>
                </div>

                <!-- Google Maps -->
                <div class="container mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps?q=-6.754835, 110.755900&hl=es;z=14&output=embed"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">

                        <!-- Alamat -->
                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                                <a href="{{ $setting->maps_url }}" target="_blank" class="icon-link">
                                    <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                                </a>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>
                                        <a href="{{ $setting->maps_url }}" class="text-link"
                                            target="_blank">{!! strip_tags($setting->alamat) !!}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <a href="{{ $setting->whatsapp_url }}" target="_blank" class="icon-link">
                                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                                </a>
                                <div>
                                    <h3>WhatsApp</h3>
                                    <p>
                                        <a href="{{ $setting->whatsapp_url }}" class="text-link"
                                            target="_blank">{{ $setting->phone }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                                <a href="mailto:{{ $setting->email }}" class="icon-link">
                                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                                </a>
                                <div>
                                    <h3>Email</h3>
                                    <p>
                                        <a href="mailto:{{ $setting->email }}"
                                            class="text-link">{{ $setting->email }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Media Sosial -->
                        <div class="col-md-6">
                            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                                <i class="icon bi bi-share flex-shrink-0"></i>
                                <div>
                                    <h3>Media Sosial</h3>
                                    <div class="social-links">
                                        @if ($setting->facebook_url)
                                            <a href="{{ $setting->facebook_url }}" target="_blank"><i
                                                    class="bi bi-facebook"></i></a>
                                        @endif
                                        @if ($setting->instagram_url)
                                            <a href="{{ $setting->instagram_url }}" target="_blank"><i
                                                    class="bi bi-instagram"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Pengaduan -->


                        <form action="{{ route('pengaduan.store') }}" method="POST" class="php-email-form"
                            data-aos="fade-up" data-aos-delay="600">
                            @csrf
                            <div class="col-12" data-aos="fade-up" data-aos-delay="550">
                                <div class="section-title text-center mb-0">
                                    <h3 class="mb-1" style="font-weight: bold;">Formulir Pengaduan</h3>
                                    <p class="text-muted mb-0">Sampaikan keluhan, pertanyaan, atau masukan Anda kepada
                                        tim
                                        kami melalui formulir berikut.</p>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Isi nama kamu!" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Isi email kamu!" required
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        oninvalid="this.setCustomValidity('Masukkan alamat email yang valid!')"
                                        oninput="this.setCustomValidity('')">

                                </div>

                                <div class="col-md-12">
                                    <input type="text" name="subject" class="form-control"
                                        placeholder="Judul Pengaduan" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea name="message" class="form-control" rows="6" placeholder="Pesan apa yang ingin kamu kirim?"
                                        required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan kamu sudah terkirim. Terima kasih!</div>

                                    <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </section>
        @else
            <h2 class="text-center my-5">Data kontak tidak ditemukan.</h2>
        @endif

    </main>

    <!-- ======= Footer ======= -->
    @include('footer')
    <!-- End Footer -->

</body>

</html>
<!-- Tambahkan setelah script AOS.js -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // <-- ini yang penting
        duration: 800,
        offset: 200,
    });
</script>
