<?php

namespace App\Filament\Resources\KeunggulankamiResource\Pages;

use App\Filament\Resources\KeunggulankamiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeunggulankami extends EditRecord
{
    protected static string $resource = KeunggulankamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
