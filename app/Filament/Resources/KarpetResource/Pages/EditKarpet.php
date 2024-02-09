<?php

namespace App\Filament\Resources\KarpetResource\Pages;

use App\Filament\Resources\KarpetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKarpet extends EditRecord
{
    protected static string $resource = KarpetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
