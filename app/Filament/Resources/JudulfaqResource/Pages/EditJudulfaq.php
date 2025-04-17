<?php

namespace App\Filament\Resources\JudulfaqResource\Pages;

use App\Filament\Resources\JudulfaqResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJudulfaq extends EditRecord
{
    protected static string $resource = JudulfaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
