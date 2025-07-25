<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareLokasi extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'judul_lokasi',
        'link_maps'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
