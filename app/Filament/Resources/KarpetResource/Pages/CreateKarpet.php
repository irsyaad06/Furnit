<?php

namespace App\Filament\Resources\KarpetResource\Pages;

use App\Filament\Resources\KarpetResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKarpet extends CreateRecord
{
    protected static string $resource = KarpetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
