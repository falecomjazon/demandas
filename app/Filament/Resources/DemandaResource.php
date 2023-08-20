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
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Panel;
use App\Filament\Enums\StatusEnum;
use App\Filament\Enums\TipoEnum;
use Filament\Tables\Filters\SelectFilter;

class DemandaResource extends Resource
{
    protected static ?string $model = Demanda::class;

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';

     public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    } 

    protected int | string | array $columnSpan = 'full';
   // protected static ?string $navigationLabel = 'Custom Navigation Label';
   
   //protected static ?string $navigationGroup = 'Settings';

    //oculta o menu para o usuário
   //protected static bool $shouldRegisterNavigation = false;
    
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
                    ->numeric()
                    ->label('Prioridade'),
               
                Forms\Components\TextInput::make('st_demanda')
                    ->required()
                    ->label('Demanda')
                    ->autofocus()
                    ->maxLength(255),
                Forms\Components\Select::make('st_status')
                    ->label('Status')
                    ->options(StatusEnum::STATUS),
                Forms\Components\Select::make('st_tipo')
                    ->label('Tipo')
                    ->options(TipoEnum::TIPO_DEMANDA),
                Forms\Components\TextInput::make('st_modulo')
                    ->required()
                    ->label('Módulo')
                    ->maxLength(255),
                Forms\Components\TextInput::make('st_descricao')
                    ->label('Descrição')
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
                    ->label('Sequencia')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('bo_prioridade')
                    ->label('Prioridade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('st_modulo')
                    ->label('Módulo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('st_demanda')
                    ->label('Demanda')
                    ->searchable(),
                Tables\Columns\TextColumn::make('st_status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->colors([
                        'danger'=>'Aguardando',
                        'success' =>'Feito',
                        'warning' =>'Fazendo'
                    ]),

                Tables\Columns\TextColumn::make('st_tipo')
                    ->label('Tipo')
                    ->searchable()
                    ->colors([
                        'danger'=>'Bug',
                        'success' =>'Feature',
                        'warning' =>'Refactory'
                    ]),
                    
                /*  Tables\Columns\SelectColumn::make('st_status')
                    ->label('Status')
                    ->options(StatusEnum::STATUS)
                    ->searchable(), */


              
/*                 Tables\Columns\TextColumn::make('dt_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dt_conclusao')
                    ->date()
                    ->sortable(),
 */                Tables\Columns\TextColumn::make('dt_cadastro')
                    ->dateTime('d/m/Y')
                    ->label('Cadastrado')
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
                //TernaryFilter::make('st_modulo')
                SelectFilter::make('st_tipo')
                    ->options(TipoEnum::TIPO_DEMANDA)
                    ->label('Tipo')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
