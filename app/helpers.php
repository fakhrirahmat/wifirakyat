<?php

use App\Models\alasan;
use App\Models\faq;
use App\Models\installation;
use App\Models\jumbotron;
use App\Models\infopaket;
use App\Models\judulfaq;
use App\Models\judulpaket;
use App\Models\keunggulankami;
use App\Models\promotion;
use App\Models\setting;
use App\Models\sponsors;
use App\Models\tentangkami;
use App\Models\testimonial2;
use App\Models\testimonials;

function get_jumbotron_data($key)
{
    $data = jumbotron::where('post_as', $key)->first();
    if (isset($data)) {
        return $data;
    }
}
function get_sponsors()
{
    $data = sponsors::all();
    return $data;
}
function get_alasan_data()
{
    $data = alasan::all();
    return $data;
}
function get_installation_data()
{
    return installation::all();
    return $data;
}
function get_promotion_data()
{
    $data = promotion::all();
    return $data;
}
function get_testimonial()
{
    return testimonials::first();
}
function get_testimonial2_data()
{
    $data = testimonial2::all();
    return $data;
}
function get_tentangkami_data()
{
    return tentangkami::first();
}
function get_keunggulankami_data()
{
    return keunggulankami::all(); // Mengembalikan satu objek, bukan koleksi
}
function get_infopaket_data()
{
    return infopaket::all(); // Mengembalikan satu objek, bukan koleksi
}
function get_judulpaket_data()
{
    return judulpaket::first(); // Mengembalikan satu objek, bukan koleksi
}
function get_setting_data()
{
    return setting::first(); // Mengembalikan satu objek, bukan koleksi
}
function get_judulfaq_data()
{
    return judulfaq::first(); // Mengembalikan satu objek, bukan koleksi
}
function get_faq_data()
{
    return faq::all(); // Mengembalikan satu objek, bukan koleksi
}
