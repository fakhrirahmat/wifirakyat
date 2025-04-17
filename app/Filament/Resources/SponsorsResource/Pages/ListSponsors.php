<?php

namespace App\Filament\Resources\SponsorsResource\Pages;

use App\Filament\Resources\SponsorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSponsors extends ListRecords
{
    protected static string $resource = SponsorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
