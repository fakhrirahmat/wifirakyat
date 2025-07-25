<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-3">👋 Selamat Datang, {{ $user->nama }}</h2>

                <div class="mb-3">
                    <p>Status Pendaftaran Anda:</p>
                    @if ($user->status === 'aktif')
                        <span class="badge bg-success">Aktif - Pendaftaran Disetujui</span>
                    @elseif ($user->status === 'menunggu')
                        <span class="badge bg-warning text-dark">Menunggu Verifikasi Admin</span>
                    @else
                        <span class="badge bg-secondary">{{ ucfirst($user->status) }}</span>
                    @endif
                </div>

                <hr>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
