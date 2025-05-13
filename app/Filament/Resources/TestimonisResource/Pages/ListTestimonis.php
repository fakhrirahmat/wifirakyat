<?php

namespace App\Filament\Resources\TestimonisResource\Pages;

use App\Filament\Resources\TestimonisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestimonis extends ListRecords
{
    protected static string $resource = TestimonisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
