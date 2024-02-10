<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KarpetResource\Pages;
use App\Filament\Resources\KarpetResource\RelationManagers;
use App\Models\Karpet;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KarpetResource extends Resource
{
    protected static ?string $model = Karpet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    protected static ?string $pluralModelLabel = 'Karpet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Masukkan Data Karpet')
                ->description('Masukkan data Karpet untuk pendataan dan dijual')
                ->schema([
                    TextInput::make('nama')->required(),
                        Grid::make()
                            ->schema([
                                TextInput::make('bahan')->required(),
                            ])->columns(1),
                        Grid::make()
                            ->schema([
                                
                                TextInput::make('panjang')->required()->numeric()->default(0)->suffix('cm'),
                                TextInput::make('lebar')->required()->numeric()->default(0)->suffix('cm'),
                            ])->columns(2),
                            TextInput::make('harga')->required()->prefix('Rp'),
                            TextInput::make('stok')->required()->numeric()->default(0)->suffix('pcs'),
                        ])
                ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->alignCenter()->label('No'),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('bahan')->searchable(),
                TextColumn::make('panjang')->suffix(' cm')->badge() ->color('success'),
                TextColumn::make('lebar')->suffix(' cm')->badge() ->color('primary'),
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
            'index' => Pages\ListKarpets::route('/'),
            'create' => Pages\CreateKarpet::route('/create'),
            'edit' => Pages\EditKarpet::route('/{record}/edit'),
        ];
    }
}
