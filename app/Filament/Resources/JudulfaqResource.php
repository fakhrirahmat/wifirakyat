<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JudulfaqResource\Pages;
use App\Filament\Resources\JudulfaqResource\RelationManagers;
use Filament\Forms\Components\Card;
use App\Models\Judulfaq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JudulfaqResource extends Resource
{
    protected static ?string $navigationGroup = 'FAQ';
    protected static ?string $model = Judulfaq::class;

    protected static ?string $navigationIcon = 'heroicon-s-bars-3';

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
                    Forms\Components\RichEditor::make('isi')
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
                Tables\Columns\TextColumn::make('isi')
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListJudulfaqs::route('/'),
            // 'create' => Pages\CreateJudulfaq::route('/create'),
            'edit' => Pages\EditJudulfaq::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false; // Menonaktifkan fitur tambah data
    }
}
