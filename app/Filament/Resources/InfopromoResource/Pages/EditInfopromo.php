<?php

namespace App\Filament\Resources\InfopromoResource\Pages;

use App\Filament\Resources\InfopromoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfopromo extends EditRecord
{
    protected static string $resource = InfopromoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
