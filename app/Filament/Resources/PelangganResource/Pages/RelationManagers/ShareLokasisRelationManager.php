<?php

namespace App\Filament\Resources\PelangganResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ShareLokasisRelationManager extends RelationManager
{
    protected static string $relationship = 'shareLokasis';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul_lokasi')->required(),
            Forms\Components\TextInput::make('link_maps')->url()->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('judul_lokasi'),
            TextColumn::make('link_maps')
                ->label('Link Maps')
                ->formatStateUsing(fn($state) => "<a href='$state' target='_blank'>$state</a>")
                ->html(),

        ]);
    }
}
