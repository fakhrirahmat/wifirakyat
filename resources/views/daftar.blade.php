@extends('layouts.app')

@section('content')
    <section id="daftar" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Form Pendaftaran Internet Rakyat</h2>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="/daftar" method="POST" class="php-email-form">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <select name="paket" class="form-control" required>
                            <option value="">Pilih Paket</option>
                            <option value="basic">Basic</option>
                            <option value="premium">Premium</option>
                        </select>
                    </div>
                    <div class="col-12 form-group">
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap" required></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-promo">Daftar Sekarang</button>
                </div>
            </form>
        </div>
    </section>
@endsection
