<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    protected $fillable = ['logo', 'nama_sponsor', 'description'];
}
