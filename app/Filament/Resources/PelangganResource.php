<?php

namespace App\Filament\Resources;

use Filament\Forms\Form; // UNTUK FORM
use Filament\Tables\Table; // UNTUK TABLE
use Filament\Resources\Resource;
use App\Models\Pelanggan;
use Filament\Tables;
use Filament\Forms;
use App\Filament\Resources\PelangganResource\Pages;

class PelangganResource extends Resource
{
    protected static ?string $model = Pelanggan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Pendaftaran Pelanggan';


    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\PelangganResource\RelationManagers\ShareLokasisRelationManager::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('username')->required(),
                Forms\Components\TextInput::make('email')->required(),
                Forms\Components\TextInput::make('no_hp'),
                Forms\Components\Textarea::make('alamat'),
                Forms\Components\TextInput::make('paket'),
                Forms\Components\Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Diterima' => 'Diterima',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('username'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'danger' => 'Pending',
                        'success' => 'Diterima',
                        'warning' => 'Ditolak',
                    ]),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPelanggans::route('/'),
            'edit' => Pages\EditPelanggan::route('/{record}/edit'),
        ];
    }
}
