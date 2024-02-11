<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AksesorisResource\Pages;
use App\Filament\Resources\AksesorisResource\RelationManagers;
use App\Models\Aksesoris;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AksesorisResource extends Resource
{
    protected static ?string $model = Aksesoris::class;

    protected static ?string $navigationIcon = 'mdi-lamps';

    protected static ?int $navigationSort = 5;

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Masukkan Data Aksesoris')
                ->description('Masukkan data Aksesoris untuk pendataan dan dijual')
                ->schema([
                    Grid::make()
                        ->schema([
                            TextInput::make('nama')->required(),
                            Select::make('jenis')
                                ->label('Jenis Aksesoris')
                                ->options([
                                    'Lampu' => 'Lampu',
                                    'Rak' => 'Rak',
                                    'Hiasan Dinding' => 'Hiasan Dinding',
                                    'Hiasan Meja' => 'Hiasan Meja',
                                    'Hiasan Atap' => 'Hiasan Atap',
                                ])
                    ])->columns(3),

                    Grid::make()
                        ->schema([
                                TextInput::make('bahan')->required(),
                                TextInput::make('warna')->required(),
                    ])->columns(3),

                            TextInput::make('harga')->required()->prefix('Rp'),
                            TextInput::make('stok')->required()->numeric()->default(0)->suffix('pcs'),
                            FileUpload::make('gambar')->image()->preserveFilenames()->disk('public')->openable()->previewable()->required()->columnSpan('full'),
                        ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->alignCenter()->label('No'),
                ImageColumn::make('gambar')->disk('public')->width(100)->height(100)->square()->visibility('private'),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('jenis')
                ->searchable()
                ->label('Jenis Aksesoris')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Lampu' => 'danger',
                    'Rak' => 'gray',
                    'Hiasan Dinding' => 'info',
                    'Hiasan Meja' => 'success',
                    'Hiasan Atap' => 'primary',
                }),
                TextColumn::make('bahan')->searchable(),
                TextColumn::make('warna')->searchable(),
                TextColumn::make('harga')->money('IDR')->searchable(),
                TextColumn::make('stok')->alignCenter()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAksesoris::route('/'),
            'create' => Pages\CreateAksesoris::route('/create'),
            'edit' => Pages\EditAksesoris::route('/{record}/edit'),
        ];
    }
}
