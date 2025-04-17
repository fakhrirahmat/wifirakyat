<?php

namespace App\Filament\Resources\JudulpaketResource\Pages;

use App\Filament\Resources\JudulpaketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJudulpakets extends ListRecords
{
    protected static string $resource = JudulpaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
