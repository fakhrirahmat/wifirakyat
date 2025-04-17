<?php

namespace App\Filament\Resources\KeunggulankamiResource\Pages;

use App\Filament\Resources\KeunggulankamiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeunggulankamis extends ListRecords
{
    protected static string $resource = KeunggulankamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
