<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonisResource\Pages;
use App\Filament\Resources\TestimonisResource\RelationManagers;
use App\Models\testimoni;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonisResource extends Resource
{
    protected static ?string $navigationGroup = 'Index';
    protected static ?string $model = testimoni::class;

    protected static ?string $navigationIcon = 'heroicon-s-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('image_url')
                        ->disk('public')
                        ->directory('uploads/testimoni')
                        ->preserveFilenames()
                        ->deleteUploadedFileUsing(function ($file, $record) {
                            if ($record && $record->image_url) {
                                Storage::disk('public')->delete($record->image_url);
                            }
                        })
                        ->image()
                        ->required(),
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('jabatan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('pesan')
                        ->required()
                        ->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pesan')
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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimonis::route('/create'),
            'edit' => Pages\EditTestimonis::route('/{record}/edit'),
        ];
    }
}
