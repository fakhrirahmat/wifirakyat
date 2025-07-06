<?php

use App\Filament\Resources\TestimonisResource;
use App\Models\Alasan;
use App\Models\Faq;
use App\Models\Installation;
use App\Models\Jumbotron;
use App\Models\Infopaket;
use App\Models\Judulfaq;
use App\Models\Judulpaket;
use App\Models\Keunggulankami;
use App\Models\Promotion;
use App\Models\Setting;
use App\Models\Sponsors;
use App\Models\Tentangkami;
// use App\Models\testimonial2;
use App\Models\Testimoni;
use App\Models\Infopromo;

function get_jumbotron_data($key)
{
    $data = Jumbotron::where('post_as', $key)->first();
    if (isset($data)) {
        return $data;
    }
}
function get_sponsors()
{
    $data = Sponsors::all();
    return $data;
}
function get_alasan_data()
{
    $data = Alasan::all();
    return $data;
}
function get_installation_data()
{
    return Installation::all();
    return $data;
}
function get_promotion_data()
{
    $data = Promotion::all();
    return $data;
}
function get_testimoni_data()
{
    return Testimoni::all();
}
// function get_testimonial2_data()
// {
//     $data = testimonial2::all();
//     return $data;
// }
function get_tentangkami_data()
{
    return Tentangkami::first();
}
function get_keunggulankami_data()
{
    return Keunggulankami::all(); // Mengembalikan satu objek, bukan koleksi
}
function get_infopaket_data()
{
    return Infopaket::all(); // Mengembalikan satu objek, bukan koleksi
}
function get_judulpaket_data()
{
    return Judulpaket::first(); // Mengembalikan satu objek, bukan koleksi
}
function get_setting_data()
{
    return Setting::first(); // Mengembalikan satu objek, bukan koleksi
}
function get_judulfaq_data()
{
    return Judulfaq::first(); // Mengembalikan satu objek, bukan koleksi
}
function get_faq_data()
{
    return Faq::all(); // Mengembalikan satu objek, bukan koleksi
}
function get_infopromo_data()
{
    return Infopromo::first(); // Mengembalikan satu objek, bukan koleksi
}
