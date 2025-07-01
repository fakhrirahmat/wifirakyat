<?php

namespace App\Filament\Resources\FormulirPengaduanResource\Pages;

use App\Filament\Resources\FormulirPengaduanResource;
use Filament\Resources\Pages\EditRecord;
use App\Mail\TanggapanPengaduan;
use Illuminate\Support\Facades\Mail;

class EditFormulirPengaduan extends EditRecord
{
    protected static string $resource = FormulirPengaduanResource::class;

    protected function afterSave(): void
    {
        $pengaduan = $this->record;

        if ($pengaduan->response) {
            Mail::to($pengaduan->email)->send(new TanggapanPengaduan($pengaduan));
        }
    }
}
