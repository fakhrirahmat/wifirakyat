<?php

namespace App\Filament\Resources\FormulirPengaduanResource\Pages;

use App\Filament\Resources\FormulirPengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormulirPengaduans extends ListRecords
{
    protected static string $resource = FormulirPengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
