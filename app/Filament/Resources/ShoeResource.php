<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShoeResource\Pages;
use App\Filament\Resources\ShoeResource\RelationManagers;
use App\Models\Shoe;
use Doctrine\DBAL\Schema\Schema;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShoeResource extends Resource
{
    protected static ?string $model = Shoe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Products';
    }

    protected function getHeading()
    {
        return 'Daftar Products';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Details')
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                    TextInput::make('price')
                    ->required()
                    ->numeric(),

                    FileUpload::make('thumbnail')
                    ->required()
                    ->maxSize('1024'),

                    Repeater::make('sizes')
                    ->relationship('shoeSizes')
                    ->schema([
                        TextInput::make('size')
                    ]),

                    Repeater::make('photos')
                    ->relationship('shoePhotos')
                    ->schema([
                        FileUpload::make('photo')
                        ->required()
                        ->maxSize('1048')
                    ]),
                ]),

                Fieldset::make('Description')
                ->schema([
                    MarkdownEditor::make('about')
                    ->required()
                    ->maxLength(255),

                    Select::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->required(),

                    Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->preload()
                    ->required(),

                    Select::make('is_popular')
                    ->options([
                        true => 'Popular',
                        false => 'Not Popular'
                    ])
                    ->required(),

                    TextInput::make('stock')
                    ->numeric()
                    ->required(),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),

                TextColumn::make('brand.name'),

                TextColumn::make('price')
                ->prefix('IDR ')
                ->numeric(decimalPlaces: 0),

                ImageColumn::make('thumbnail'),

                IconColumn::make('is_popular')
                ->boolean()
                ->trueColor('success')
                ->falseColor('danger')
                ->trueIcon('heroicon-o-check-badge')
                ->falseIcon('heroicon-o-x-circle')
                ->label('Popular'),

                TextColumn::make('stock'),
            ])
            ->filters([
                SelectFilter::make('brand_id')
                ->relationship('brand', 'name')
                ->label('brands'),

                SelectFilter::make('category_id')
                ->relationship('category', 'name')
                ->label('categories')

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListShoes::route('/'),
            'create' => Pages\CreateShoe::route('/create'),
            'edit' => Pages\EditShoe::route('/{record}/edit'),
        ];
    }
}
