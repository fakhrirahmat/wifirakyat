<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Infopaket;

class AuthController extends Controller
{
    public function registerForm()
    {
        $pakets = Infopaket::all(); // Ambil semua data paket
        return view('pelanggan.register', compact('pakets'));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:pelanggans',
            'email' => 'required|email|unique:pelanggans',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'alamat' => 'required',
            'paket' => 'required',
            'judul_lokasi' => 'required|array',
            'judul_lokasi.*' => 'required|string',
            'link_maps' => 'required|array',
            'link_maps.*' => 'required|url',
            'foto_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
        ]);

        // Ambil title paket berdasarkan ID dari request
        $paketTerpilih = Infopaket::find($request->paket);
        $data['paket'] = $paketTerpilih ? $paketTerpilih->title : '-';

        // Enkripsi password
        $data['password'] = Hash::make($data['password']);

        // Upload foto KTP ke folder 'ktp' di penyimpanan publik
        if ($request->hasFile('foto_ktp')) {
            $path = $request->file('foto_ktp')->store('ktp', 'public');
            $data['foto_ktp'] = $path;
        }

        //Status pemasangan
        $data['status'] = 'pending';

        // Simpan pelanggan
        $pelanggan = Pelanggan::create($data);

        // Simpan semua lokasi yang dikirim user
        foreach ($request->judul_lokasi as $i => $judul) {
            $pelanggan->shareLokasis()->create([
                'judul_lokasi' => $judul,
                'link_maps' => $request->link_maps[$i],
            ]);
        }

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    public function loginForm()
    {
        return view('pelanggan.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();
        return redirect('/');
    }
}
