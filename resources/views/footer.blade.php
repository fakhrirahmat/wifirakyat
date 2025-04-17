@php
    $setting = get_setting_data();
@endphp

<footer id="footer" class="footer light-background">

    @if ($setting)
        <div class="container footer-top">
            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="footer-contact pt-3">
                        <p>{!! nl2br($setting->alamat) !!}</p>

                        <p class="mt-3"><strong>No. Telephone:</strong> <span>{{ $setting->phone }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $setting->email }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="{{ $setting->facebook_url }}"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $setting->instagram_url }}"><i class="bi bi-instagram"></i></a>
                        {{-- <a href=""><i class="bi bi-twitter-x"></i></a> --}}
                        {{-- <a href=""><i class="bi bi-linkedin"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Tentang Perusahaan</h4>
                    <ul>
                        <li><a href="/faq">> FAQ</a></li>
                        <li><a href="/about">> Tentang Kami</a></li>
                        <li><a href="/contact">> Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Support System</h4>
                    <ul>
                        <li><a href="https://www.speedtest.net/">> Speedtest</a></li>
                        {{-- <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li> --}}
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-support">
                    <h4 class="support-title">Dukung Kami!</h4>
                    <div class="logo1-container">
                        <img src="{{ Storage::url($setting->logo_1) }}" alt="Internet Rakyat" class="logo1">
                        <div class="vertical-separator"></div> <!-- Garis pemisah vertikal -->
                        <img src="{{ Storage::url($setting->logo_2) }}" alt="LNS" class="logo1">
                    </div>
                </div>


            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $setting->judul_situs }}</strong> <span>All
                    Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
        </div>
    @else
        <h2>setting tidak ditemukan</h2>
    @endif

</footer>


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
