<?php

namespace App\Filament\Resources\TestimonialsResource\Pages;

use App\Filament\Resources\TestimonialsResource;
use App\Models\testimonials;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditTestimonials extends EditRecord
{
    protected static string $resource = TestimonialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (testimonials $record) {
                    if ($record->logo) {
                        Storage::disk('public')->delete($record->logo);
                    }
                }
            ),
        ];
    }
}
