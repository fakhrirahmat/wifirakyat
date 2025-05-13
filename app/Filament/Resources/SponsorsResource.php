<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorsResource\Pages;
use App\Filament\Resources\SponsorsResource\RelationManagers;
use App\Models\Sponsors;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SponsorsResource extends Resource
{
    protected static ?string $model = Sponsors::class;
    protected static ?string $navigationGroup = 'Index';
    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::count();
    // }
    // public static function getNavigationBadgeTooltip(): ?string
    // {
    //     return 'Total sponsor';
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('logo')
                        ->required()->image()->disk('public'),
                    Forms\Components\TextInput::make('nama_sponsor')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('description')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_sponsor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsors::route('/create'),
            'edit' => Pages\EditSponsors::route('/{record}/edit'),
        ];
    }
}
