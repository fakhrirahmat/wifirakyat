<?php

namespace App\Filament\Resources\JudulpaketResource\Pages;

use App\Filament\Resources\JudulpaketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJudulpaket extends EditRecord
{
    protected static string $resource = JudulpaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
