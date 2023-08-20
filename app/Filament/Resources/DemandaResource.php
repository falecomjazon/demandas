<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemandaResource\Pages;
use App\Filament\Resources\DemandaResource\RelationManagers;
use App\Models\Demanda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\TernaryFilter;

class DemandaResource extends Resource
{
    protected static ?string $model = Demanda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
       //return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nu_prioridade')
                    ->numeric(),
                Forms\Components\TextInput::make('st_demanda')
                    ->required()
                    ->autofocus()
                    ->maxLength(255),
                Forms\Components\TextInput::make('st_modulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('st_descricao')
                    ->maxLength(255),
               // Forms\Components\DatePicker::make('dt_inicio'),
               // Forms\Components\DatePicker::make('dt_conclusao'),
              //  Forms\Components\DateTimePicker::make('dt_cadastro')
              //      ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nu_prioridade')
                    ->numeric()
                    ->label('Prioridade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('st_demanda')
                    ->label('Demanda')
                    ->searchable(),
                Tables\Columns\TextColumn::make('st_modulo')
                    ->label('Módulo')
                    ->searchable(),
/*                 Tables\Columns\TextColumn::make('dt_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dt_conclusao')
                    ->date()
                    ->sortable(),
 */                Tables\Columns\TextColumn::make('dt_cadastro')
                    ->dateTime()
                    ->sortable(),
/*                 Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
 */            ])
            ->filters([
                TernaryFilter::make('st_modulo')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListDemandas::route('/'),
            'create' => Pages\CreateDemanda::route('/create'),
            'edit' => Pages\EditDemanda::route('/{record}/edit'),
        ];
    }    
}
