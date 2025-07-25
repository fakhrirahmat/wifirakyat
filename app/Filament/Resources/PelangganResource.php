<?php

namespace App\Filament\Resources;

use Filament\Forms\Form;
use Filament\Forms;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Models\Pelanggan;
use App\Filament\Resources\PelangganResource\Pages;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

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
        return $form->schema([
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

            FileUpload::make('foto_ktp')
                ->label('Foto KTP')
                ->disk('public')
                ->directory('') // Kosong karena langsung di storage/app/public
                ->image()
                ->imageEditor()
                ->downloadable()
                ->openable()
                ->visibility('public')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_ktp')
                    ->label('Foto KTP')
                    ->disk('public')
                    ->circular()
                    ->height(60),

                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('username'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'danger' => 'Pending',
                        'success' => 'Diterima',
                        'warning' => 'Ditolak',
                    ]),
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
