<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangkamiResource\Pages;
use App\Filament\Resources\TentangkamiResource\RelationManagers;
use App\Models\Tentangkami;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TentangkamiResource extends Resource
{
    protected static ?string $navigationGroup = 'Tentang Kami';
    protected static ?string $model = Tentangkami::class;

    protected static ?string $navigationIcon = 'heroicon-s-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('image_url')
                        ->disk('public')
                        ->directory('uploads/tentangkami')
                        ->preserveFilenames()
                        ->deleteUploadedFileUsing(function ($file, $record) {
                            if ($record && $record->image_url) {
                                Storage::disk('public')->delete($record->image_url);
                            }
                        })
                        ->image()
                        ->required(),
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
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
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
            'index' => Pages\ListTentangkamis::route('/'),
            'create' => Pages\CreateTentangkami::route('/create'),
            'edit' => Pages\EditTentangkami::route('/{record}/edit'),
        ];
    }
}
