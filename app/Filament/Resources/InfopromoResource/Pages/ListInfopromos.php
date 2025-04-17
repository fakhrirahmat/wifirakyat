<?php

namespace App\Filament\Resources\InfopromoResource\Pages;

use App\Filament\Resources\InfopromoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfopromos extends ListRecords
{
    protected static string $resource = InfopromoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
