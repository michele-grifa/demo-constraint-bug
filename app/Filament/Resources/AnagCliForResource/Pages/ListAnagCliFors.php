<?php

namespace App\Filament\Resources\AnagCliForResource\Pages;

use App\Filament\Resources\AnagCliForResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnagCliFors extends ListRecords
{
    protected static string $resource = AnagCliForResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
