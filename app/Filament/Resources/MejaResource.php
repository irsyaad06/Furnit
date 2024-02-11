<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MejaResource\Pages;
use App\Filament\Resources\MejaResource\RelationManagers;
use App\Models\Meja;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MejaResource extends Resource
{
    protected static ?string $model = Meja::class;

    protected static ?string $navigationIcon = 'mdi-table-furniture';

    protected static ?int $navigationSort = 1 ;

    protected static ?string $pluralModelLabel = 'Meja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Masukkan Data Meja')
                    ->description('Masukkan data meja untuk pendataan dan dijual')
                    ->schema([
                        TextInput::make('nama')->required(),
                            Grid::make()
                                ->schema([
                                    TextInput::make('jenis')->required(),
                                    TextInput::make('bahan')->required(),
                                    TextInput::make('warna')->required(),
                                ])->columns(3),
                            Grid::make()
                                ->schema([
                                    
                                    TextInput::make('panjang')->required()->numeric()->default(0)->suffix('cm'),
                                    TextInput::make('lebar')->required()->numeric()->default(0)->suffix('cm'),
                                    TextInput::make('tinggi')->required()->numeric()->default(0)->suffix('cm'),
                                ])->columns(3),
                                TextInput::make('harga')->required()->prefix('Rp'),
                                TextInput::make('stok')->required()->numeric()->default(0)->suffix('pcs'),
                                FileUpload::make('gambar')->image()->preserveFilenames()->disk('public')->openable()->previewable()->required()->columnSpan('full'),
                            ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->alignCenter()->label('No'),
                ImageColumn::make('gambar')->disk('public')->width(100)->height(100)->square()->visibility('private'),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('jenis')->searchable(),
                TextColumn::make('bahan')->searchable(),
                TextColumn::make('warna')->searchable(),
                TextColumn::make('panjang')->suffix(' cm')->badge() ->color('success'),
                TextColumn::make('lebar')->suffix(' cm')->badge() ->color('primary'),
                TextColumn::make('tinggi')->suffix(' cm')->badge() ->color('warning'),
                TextColumn::make('harga')->money('IDR'),
                TextColumn::make('stok')->alignCenter(),
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
            'index' => Pages\ListMejas::route('/'),
            'create' => Pages\CreateMeja::route('/create'),
            'edit' => Pages\EditMeja::route('/{record}/edit'),
        ];
    }
}
