<?php

namespace App\Filament\Resources\LemariResource\Pages;

use App\Filament\Resources\LemariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLemaris extends ListRecords
{
    protected static string $resource = LemariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
