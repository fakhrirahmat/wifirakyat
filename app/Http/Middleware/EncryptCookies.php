<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    // Jika ingin mengecualikan cookie agar tidak dienkripsi, bisa ditambahkan di properti $except
    protected $except = [
        //
    ];
}
