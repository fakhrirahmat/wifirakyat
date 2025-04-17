<?php

namespace App\Filament\Resources\Testimonial2Resource\Pages;

use App\Filament\Resources\Testimonial2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestimonial2s extends ListRecords
{
    protected static string $resource = Testimonial2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
