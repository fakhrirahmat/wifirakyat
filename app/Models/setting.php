<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class setting extends Model
{
    protected $table = 'settings'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = ['icon', 'judul_situs', 'whatsapp_url', 'alamat', 'email', 'phone', 'facebook_url', 'instagram_url', 'logo_1', 'logo_2'];

    public static function boot()
    {
        parent::boot();

        // Saat model diperbarui
        static::updating(function ($model) {
            $fieldsToCheck = ['icon', 'logo_1', 'logo_2']; // 🔹 Daftar gambar yang perlu dicek

            foreach ($fieldsToCheck as $field) {
                if ($model->isDirty($field)) { // 🔹 Cek apakah ada perubahan
                    $oldImage = $model->getOriginal($field); // 🔹 Ambil gambar lama
                    if ($oldImage) {
                        storage::disk('public')->delete($oldImage); // 🔹 Hapus gambar lama dari storage
                    }
                }
            }
        });

        // Saat model dihapus
        static::deleting(function ($model) {
            $fieldsToDelete = ['icon', 'logo_1', 'logo_2']; // 🔹 Daftar gambar yang perlu dihapus

            foreach ($fieldsToDelete as $field) {
                if ($model->$field) {
                    Storage::disk('public')->delete($model->$field); // 🔹 Hapus semua gambar dari storage
                }
            }
        });
    }
}
