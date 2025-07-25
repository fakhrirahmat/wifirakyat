<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    // Tambahkan URL yang ingin di-exclude dari CSRF di sini
    protected $except = [
        //
    ];
}
