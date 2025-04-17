<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $fillable = ['title', 'description', 'nama_tombol', 'no_hp'];
}
