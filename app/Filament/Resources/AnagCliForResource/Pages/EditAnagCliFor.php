<?php

namespace App\Filament\Resources\AnagCliForResource\Pages;

use App\Filament\Resources\AnagCliForResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnagCliFor extends EditRecord
{
    protected static string $resource = AnagCliForResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
