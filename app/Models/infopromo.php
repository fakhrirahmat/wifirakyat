<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Infopromo extends Model
{
    use HasFactory;
    protected $table = 'infopromos'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = ['image_url', 'title', 'description', 'judul_tombol'];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('image_url')) { // 🔹 Cek apakah gambar diubah
                $oldImage = $model->getOriginal('image_url'); // 🔹 Ambil gambar lama
                if ($oldImage) {
                    storage::disk('public')->delete($oldImage); // 🔹 Hapus gambar lama
                }
            }
        });

        static::deleting(function ($model) {
            if ($model->image_url) {
                Storage::disk('public')->delete($model->image_url); // Hapus file saat data dihapus
            }
        });
    }
}
