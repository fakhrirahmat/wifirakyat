<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class infopaket extends Model
{
    // use HasFactory;
    protected $table = 'infopakets'; // Sesuaikan jika nama tabel berbeda
    protected $fillable = ['title', 'pricing', 'description'];
}
