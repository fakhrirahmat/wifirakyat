<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    {{-- @if ($setting) --}}
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
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


<section class="section">

    <!-- Modal 1: Edukasi Awal -->
    <div class="modal fade" id="modalAwalRegister" tabindex="-1" aria-labelledby="modalAwalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAwalLabel">Penting Sebelum Mendaftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Pastikan Anda mengisi data dengan benar dan sesuai, agar proses pemasangan internet berjalan
                        lancar dan tanpa kendala.</p>
                    <hr>
                    <h6>Daftar Wilayah yang Tersedia:</h6>
                    <ul class="mb-0">
                        <li>Desa Ngelokulon</li>
                        <li>Desa Jleper</li>
                        <li>Desa Pasir</li>
                        <li>Desa Tempel</li>
                        <li>Desa Jetak</li>
                        <li>Desa Pecuk</li>
                        <li>Desa Mijen</li>
                        <li>Desa Ngegot</li>
                        <li>Desa Rejosari</li>
                        <li>Desa KedungsaruMulyo(Dontang)</li>
                        <li>Desa Gedangan</li>
                        <!-- Tambahkan sesuai kebutuhan -->
                    </ul>
                    <p class="mt-2 text-muted" style="font-size: 0.9rem;">*Jika desa Anda belum terdaftar, silakan
                        hubungi admin terlebih dahulu sebelum mendaftar.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnNextModal" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2: Privasi Data -->
    <div class="modal fade" id="modalKebijakanData" tabindex="-1" aria-labelledby="modalKebijakanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKebijakanLabel">Privasi Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Data pribadi Anda akan dijaga kerahasiaannya oleh Internet Rakyat dan hanya digunakan untuk
                        keperluan pemasangan dan pelayanan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnMulaiIsi" class="btn btn-success" data-bs-dismiss="modal">Oke, Mulai
                        Isi Form</button>
                </div>
            </div>
        </div>
    </div>

    {{-- tabel form pendaftaran --}}
    <div class="container">
        <div class="section-title">
            <h2>Form Pendaftaran</h2>
            <p>Silakan lengkapi data berikut untuk mendaftar sebagai pelanggan Internet Rakyat</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('daftar') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row gy-3">
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" placeholder="Isi nama lengkap kamu?"
                        required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Isi email kamu!" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                        oninvalid="this.setCustomValidity('Masukkan alamat email yang valid!')"
                        oninput="this.setCustomValidity('')">
                </div>
                <div class="col-md-6">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="col-md-6">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="no_hp" class="form-control"
                        placeholder="No HP(No. WhatsApp aktif!)" inputmode="numeric" pattern="\d*" maxlength="15"
                        required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>
                <div class="col-md-6">
                    <textarea name="alamat" id="inputAlamat" class="form-control" placeholder="Alamat Lengkap" rows="2"
                        required></textarea>
                </div>

                <div class="col-md-12">
                    <label for="foto_ktp" class="form-label">Upload Foto KTP</label>

                    <div class="mb-2">
                        <img id="previewKTP" src="{{ asset('assets/img/default-ktp.png') }}" alt="Preview KTP"
                            class="img-thumbnail" style="max-width: 250px; display: none;">
                    </div>

                    <input type="file" name="foto_ktp" id="foto_ktp" class="form-control mb-2" accept="image/*"
                        required onchange="previewFotoKTP(this)">

                    <div id="ktpActionButtons" style="display: none;">
                        <button type="button" class="btn btn-sm btn-secondary me-2"
                            onclick="gantiFotoKTP()">Ganti</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="hapusFotoKTP()">Hapus</button>
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="paket" class="form-label">Pilih Paket Internet</label>
                    <select name="paket" class="form-control" required>
                        <option value="">-- Pilih Paket --</option>
                        @foreach ($pakets as $paket)
                            <option value="{{ $paket->id }}">{{ $paket->title }} - {{ $paket->pricing }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr class="my-4">

            <div class="section-title">
                <h4 class="fw-bold mb-1">Share Lokasi Pemasangan</h4>
                <p class="text-muted mb-2" style="font-size: 0.95rem;">
                    Silakan bagikan lokasi pemasangan internet (seperti rumah, kantor, dll) menggunakan link dari Google
                    Maps.
                </p>
            </div>

            <div id="lokasi-wrapper" class="row gy-3">
                <div class="lokasi-group col-md-6">
                    <input type="text" name="judul_lokasi[]" class="form-control"
                        placeholder="Judul Lokasi (cth: Rumah)" required>
                </div>
                <div class="lokasi-group col-md-6">
                    <input type="url" name="link_maps[]" class="form-control link-maps-field"
                        placeholder="Link Google Maps" required readonly onclick="tampilkanPetunjuk(this)">
                </div>
            </div>

            <div class="mt-3">
                <button type="button" class="btn btn-outline-secondary" onclick="tambahLokasi()">+ Tambah
                    Lokasi</button>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-promo">Daftar Sekarang</button>
            </div>

            <div class="mt-3 text-center">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
                <p><a href="{{ route('index') }}">Kembali</a></p>
            </div>
        </form>

        <!-- Modal Petunjuk Link Google Maps -->
        <div class="modal fade" id="modalCaraMaps" tabindex="-1" aria-labelledby="modalMapsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalMapsLabel">Cara Mengisi Link Google Maps</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Ikuti langkah berikut:</p>
                        <ol>
                            <li>Buka <a href="https://maps.google.com" target="_blank">Google Maps</a></li>
                            <li>Cari lokasi Anda</li>
                            <li>Klik <strong>Bagikan</strong></li>
                            <li>Pilih <strong>Salin Link</strong></li>
                            <li>Tempelkan link ke dalam kolom ini</li>
                        </ol>
                        <p><strong>Contoh:</strong><br><code>https://goo.gl/maps/Abc123XYZ</code></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnModalOke" class="btn btn-primary" data-bs-dismiss="modal">OK,
                            Saya Mengerti</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Peringatan Alamat -->
        <div class="modal fade" id="modalAlamat" tabindex="-1" aria-labelledby="modalAlamatLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAlamatLabel">Perhatian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Anda mengisi alamat lengkap dan benar agar proses pemasangan dapat dilakukan tanpa
                            kendala.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnModalAlamat" class="btn btn-primary"
                            data-bs-dismiss="modal">Mengerti</button>

                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<script>
    // popup sebelum isi data
    document.addEventListener('DOMContentLoaded', function() {
        const modalAwal = new bootstrap.Modal(document.getElementById('modalAwalRegister'));
        const modalKebijakan = new bootstrap.Modal(document.getElementById('modalKebijakanData'));

        // Tampilkan modal edukasi saat pertama kali halaman dimuat
        modalAwal.show();

        // Tombol "Selanjutnya" dari modal 1 ke modal 2
        document.getElementById('btnNextModal').addEventListener('click', function() {
            modalAwal.hide();
            setTimeout(() => {
                modalKebijakan.show();
            }, 500); // beri jeda animasi sedikit
        });
    });

    // Script tambah lokasi baru
    function tambahLokasi() {
        const wrapper = document.getElementById('lokasi-wrapper');
        const row = document.createElement('div');
        row.classList.add('row', 'gy-3', 'mt-2');

        row.innerHTML = `
        <div class="col-md-5">
            <input type="text" name="judul_lokasi[]" class="form-control" placeholder="Judul Lokasi" required>
        </div>
        <div class="col-md-5">
            <input type="url" name="link_maps[]" class="form-control" placeholder="Link Google Maps" readonly required onclick="tampilkanPetunjuk(this)">
        </div>
        <div class="col-md-2 d-flex align-items-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.row').remove()">Hapus</button>
        </div>
        `;

        wrapper.appendChild(row);
    }

    // Script modal petunjuk link maps
    let targetInput = null;

    function tampilkanPetunjuk(inputElement) {
        targetInput = inputElement;
        const modal = new bootstrap.Modal(document.getElementById('modalCaraMaps'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const okButton = document.getElementById('btnModalOke');
        if (okButton) {
            okButton.addEventListener('click', function() {
                if (targetInput) {
                    targetInput.removeAttribute('readonly');
                    targetInput.focus();
                }
            });
        }
    });

    // Script modal petunjuk alamat
    let targetAlamat = null;

    document.addEventListener('DOMContentLoaded', function() {
        const alamatInput = document.getElementById('inputAlamat');
        const modalAlamat = new bootstrap.Modal(document.getElementById('modalAlamat'));

        alamatInput.addEventListener('focus', function() {
            if (!alamatInput.dataset.visited) {
                targetAlamat = alamatInput;
                modalAlamat.show();
            }
        });

        const okBtnAlamat = document.getElementById('btnModalAlamat');
        okBtnAlamat.addEventListener('click', function() {
            if (targetAlamat) {
                targetAlamat.dataset.visited = "true"; // hindari tampil lagi
                targetAlamat.focus();
            }
        });
    });

    //modal upload ktp
    function previewFotoKTP(input) {
        const preview = document.getElementById('previewKTP');
        const actionButtons = document.getElementById('ktpActionButtons');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                actionButtons.style.display = 'flex';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function gantiFotoKTP() {
        document.getElementById('foto_ktp').click();
    }

    function hapusFotoKTP() {
        const input = document.getElementById('foto_ktp');
        const preview = document.getElementById('previewKTP');
        const actionButtons = document.getElementById('ktpActionButtons');

        input.value = '';
        preview.src = '';
        preview.style.display = 'none';
        actionButtons.style.display = 'none';
    }
</script>
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
