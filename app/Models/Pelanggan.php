<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Pelanggan extends Authenticatable
{
    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'no_hp',
        'alamat',
        'paket',
        'status',
        'foto_ktp',
    ];

    protected $hidden = ['password'];

    public function shareLokasis()
    {
        return $this->hasMany(ShareLokasi::class);
    }

    // 🔹 URL helper untuk akses gambar via blade
    public function getFotoKtpUrlAttribute()
    {
        return $this->foto_ktp ? asset('storage/' . $this->foto_ktp) : null;
    }

    // 🔹 Lifecycle events: hapus file lama saat update atau delete
    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('foto_ktp')) {
                $old = $model->getOriginal('foto_ktp');
                if ($old && Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            }
        });

        static::deleting(function ($model) {
            if ($model->foto_ktp && Storage::disk('public')->exists($model->foto_ktp)) {
                Storage::disk('public')->delete($model->foto_ktp);
            }
        });
    }
}
