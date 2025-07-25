<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JudulpaketResource\Pages;
use App\Filament\Resources\JudulpaketResource\RelationManagers;
use App\Models\Judulpaket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JudulpaketResource extends Resource
{
    protected static ?string $navigationGroup = 'Paket Internet';
    protected static ?string $model = Judulpaket::class;

    protected static ?string $navigationIcon = 'heroicon-s-bars-4';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->limit(50), // membatasi 50 karakter
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJudulpakets::route('/'),
            // 'create' => Pages\CreateJudulpaket::route('/create'),
            'edit' => Pages\EditJudulpaket::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false; // Menonaktifkan fitur tambah data
    }
}
