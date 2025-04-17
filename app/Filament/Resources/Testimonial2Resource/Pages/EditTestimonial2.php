<?php

namespace App\Filament\Resources\Testimonial2Resource\Pages;

use App\Filament\Resources\Testimonial2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestimonial2 extends EditRecord
{
    protected static string $resource = Testimonial2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
