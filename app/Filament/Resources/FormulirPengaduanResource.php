<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormulirPengaduanResource\Pages;
use App\Filament\Resources\FormulirPengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormulirPengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-s-envelope';

    // fitur penyembuni nav
    // public static function shouldRegisterNavigation(): bool
    // {
    //     return false;
    // }

    public static function form(Form $form): Form
    {
        return
            $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->disabled(),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->disabled(),
                Forms\Components\Textarea::make('response')
                    ->label('Tanggapan')
                    ->placeholder('Tulis tanggapan Anda di sini...')
                    ->nullable(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('subject')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),

                // ✅ Custom action: Tanggapi via Email
                Tables\Actions\Action::make('Tanggapi')
                    ->label('Tanggapi via Email')
                    ->url(fn($record) => self::buildMailtoLink($record))
                    ->icon('heroicon-o-envelope')
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected static function buildMailtoLink($record): string
    {
        $email = $record->email;
        $subject = urlencode('Tanggapan: ' . $record->subject);
        $body = urlencode("Halo {$record->name},\n\nMenanggapi pengaduan Anda: \"{$record->message}\"\n\nBalasan Anda di sini...");

        return "mailto:$email?subject=$subject&body=$body";
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormulirPengaduans::route('/'),
            'create' => Pages\CreateFormulirPengaduan::route('/create'),
            'edit' => Pages\EditFormulirPengaduan::route('/{record}/edit'),
        ];
    }
}
