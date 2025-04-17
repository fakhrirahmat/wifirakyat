<?php

namespace App\Filament\Resources\InfopaketResource\Pages;

use App\Filament\Resources\InfopaketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfopakets extends ListRecords
{
    protected static string $resource = InfopaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
