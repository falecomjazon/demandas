<?php

namespace App\Filament\Resources\DemandaResource\Pages;

use App\Filament\Resources\DemandaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDemanda extends CreateRecord
{
    protected static string $resource = DemandaResource::class;

     /**
     * rediciona para a listagem 
     */  
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
