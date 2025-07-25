<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JumbotronResource\Pages;
use App\Filament\Resources\JumbotronResource\RelationManagers;
use App\Models\Jumbotron;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JumbotronResource extends Resource
{
    protected static ?string $model = Jumbotron::class;
    protected static ?string $navigationGroup = 'Index';
    protected static ?string $navigationIcon = 'heroicon-s-bars-2';

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
                    Forms\Components\Select::make('post_as')->options([
                        'Tagline1' => 'Tagline1',
                        'Tagline2' => 'Tagline2',
                        'Tagline3' => 'Tagline3',
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('post_as'),
                Tables\Columns\TextColumn::make('description')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->limit(50) // membatasi 50 karakter
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListJumbotrons::route('/'),
            // 'create' => Pages\CreateJumbotron::route('/create'),
            'edit' => Pages\EditJumbotron::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false; // Menonaktifkan fitur tambah data
    }
}
