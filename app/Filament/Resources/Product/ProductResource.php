<?php

namespace App\Filament\Resources\Product;

use App\Filament\Resources\Product\ProductResource\Pages;
use App\Filament\Resources\Product\ProductResource\RelationManagers;
use App\Models\Product\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ncm')
                    ->required()
                    ->maxLength(8),
                Forms\Components\TextInput::make('cest')
                    ->maxLength(7),
                Forms\Components\TextInput::make('warranty')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('height')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('width')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('length')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('weight')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tax_origin')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('short_description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name'),
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name'),
                Forms\Components\Select::make('unity_type_id')
                    ->relationship('unityType', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ncm')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cest')
                    ->searchable(),
                Tables\Columns\TextColumn::make('warranty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('width')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('length')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tax_origin')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('brand.name'),
                Tables\Columns\TextColumn::make('unityType.name'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProducts::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
