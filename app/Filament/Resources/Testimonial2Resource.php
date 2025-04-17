<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Testimonial2Resource\Pages;
use App\Filament\Resources\Testimonial2Resource\RelationManagers;
use App\Models\Testimonial2;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Testimonial2Resource extends Resource
{
    protected static ?string $model = Testimonial2::class;
    protected static ?string $navigationGroup = 'Index';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('image_url')
                        ->disk('public')
                        ->directory('uploads/testimonials')
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
                    Forms\Components\Textarea::make('pesan')
                        ->required()
                        ->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
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
            'index' => Pages\ListTestimonial2s::route('/'),
            'create' => Pages\CreateTestimonial2::route('/create'),
            'edit' => Pages\EditTestimonial2::route('/{record}/edit'),
        ];
    }
}
