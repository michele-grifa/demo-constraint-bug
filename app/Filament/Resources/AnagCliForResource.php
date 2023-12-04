<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnagCliForResource\Pages;
use App\Filament\Resources\AnagCliForResource\RelationManagers;
use App\Models\AnagCliFor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnagCliForResource extends Resource
{
    protected static ?string $model = AnagCliFor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ID_anag_clifor')
                    ->required()
                    ->maxLength(8),
                Forms\Components\TextInput::make('ID_tipo_anag')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('rag_sociale')
                    ->maxLength(180),
                Forms\Components\TextInput::make('ID_AGENTE')
                    ->maxLength(8),
                Forms\Components\TextInput::make('ID_AZIENDA')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ID_anag_clifor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ID_tipo_anag')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rag_sociale')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ID_AGENTE')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ID_AZIENDA')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                QueryBuilder::make()
                    ->constraints([
                        TextConstraint::make('rag_sociale')->label('Ragione Sociale'),
                        RelationshipConstraint::make('agente')
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('rag_sociale')
                                    ->searchable()
                                    ->modifyBaseQueryUsing(fn (Builder $query) =>
                                    $query->where('rag_sociale', '!=','')
                                        ->where('ID_tipo_anag', 'A'))
                            )
                            ->label('Agente')
                    ])
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAnagCliFors::route('/'),
            'create' => Pages\CreateAnagCliFor::route('/create'),
            'edit' => Pages\EditAnagCliFor::route('/{record}/edit'),
        ];
    }
}
