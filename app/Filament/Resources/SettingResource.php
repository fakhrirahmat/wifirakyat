<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Split;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\FileUpload::make('icon')
                        ->disk('public')
                        ->directory('uploads/settings')
                        ->preserveFilenames()
                        ->deleteUploadedFileUsing(function ($file, $record) {
                            if ($record && $record->icon) {
                                Storage::disk('public')->delete($record->icon);
                            }
                        })
                        ->image()
                        ->required(),

                    Card::make()->schema([
                        Split::make([
                            Forms\Components\TextInput::make('judul_situs')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('whatsapp_url')
                                ->required()
                                ->columnSpanFull(),
                        ]),


                    ]),

                    Forms\Components\RichEditor::make('alamat')
                        ->required()
                        ->columnSpanFull(),

                    // 🔹 Membagi formulir menjadi dua bagian
                    Card::make()->schema([
                        Split::make([
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('phone')
                                ->tel()
                                ->required()
                                ->maxLength(255),
                        ]),

                        Split::make([

                            Forms\Components\TextInput::make('facebook_url')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('instagram_url')
                                ->required()
                                ->maxLength(255),
                        ]),
                    ]),

                    // 🔹 Bagian Upload Gambar (logo_1 dan logo_2)
                    Card::make()->schema([
                        Forms\Components\FileUpload::make('logo_1')
                            ->disk('public')
                            ->directory('uploads/settings')
                            ->preserveFilenames()
                            ->deleteUploadedFileUsing(function ($file, $record) {
                                if ($record && $record->logo_1) {
                                    Storage::disk('public')->delete($record->logo_1);
                                }
                            })
                            ->image()
                            ->required(),
                        Forms\Components\FileUpload::make('logo_2')
                            ->disk('public')
                            ->directory('uploads/settings')
                            ->preserveFilenames()
                            ->deleteUploadedFileUsing(function ($file, $record) {
                                if ($record && $record->logo_2) {
                                    Storage::disk('public')->delete($record->logo_2);
                                }
                            })
                            ->image()
                            ->required(),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul_situs')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('instagram_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('logo_1')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('logo_2')
                    ->disk('public')
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
                Tables\Actions\EditAction::make(), // Hanya tombol edit
            ])
            ->bulkActions([]); // Hapus aksi massal agar tidak bisa hapus banyak data
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
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false; // Menonaktifkan fitur tambah data
    }
}
