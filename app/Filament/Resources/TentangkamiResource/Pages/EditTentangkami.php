<?php

namespace App\Filament\Resources\TentangkamiResource\Pages;

use App\Filament\Resources\TentangkamiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTentangkami extends EditRecord
{
    protected static string $resource = TentangkamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
