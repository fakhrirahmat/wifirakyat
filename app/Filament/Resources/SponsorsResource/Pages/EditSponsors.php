<?php

namespace App\Filament\Resources\SponsorsResource\Pages;

use App\Filament\Resources\SponsorsResource;
use App\Models\sponsors;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditSponsors extends EditRecord
{
    protected static string $resource = SponsorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (sponsors $record) {
                    if ($record->logo) {
                        Storage::disk('public')->delete($record->logo);
                    }
                }
            ),
        ];
    }
}
