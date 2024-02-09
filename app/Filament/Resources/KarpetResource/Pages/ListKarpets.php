<?php

namespace App\Filament\Resources\KarpetResource\Pages;

use App\Filament\Resources\KarpetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKarpets extends ListRecords
{
    protected static string $resource = KarpetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
