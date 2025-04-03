<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Models\Vehicle;

use App\Filament\Resources\VehicleResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('make')
                    ->label('Make')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('model')
                    ->label('Model')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('year')
                    ->label('Year')
                    ->required()
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(2100),

                Forms\Components\TextInput::make('color')
                    ->label('Color')
                    ->nullable()
                    ->maxLength(50),

                Forms\Components\Repeater::make('images')
                    ->relationship()
                    ->label('Vehicle Images')
                    ->schema([
                        Forms\Components\FileUpload::make('url')
                            ->label('Image')
                            ->image()
                            ->directory('vehicles')
                            ->preserveFilenames()
                            ->imageEditor()
                            ->required()
                            ->visibility('public')  // Add this line
                            ->imagePreviewHeight('250') 
                            ->disk('public')  // Explicitly set the disk  
                         ,
                    ])
                    ->collapsible()
                    ->itemLabel(function (array $state): ?string {
                        // Handle both array and string cases for the URL
                        $url = is_array($state['url'] ?? null) ? $state['url'][0] ?? null : $state['url'] ?? null;
                        return $url ? basename($url) : null;
                    })
                    ->grid(2)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('registration_number')
                    ->label('Registration Number')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20),

                Forms\Components\TextInput::make('mileage')
                    ->label('Mileage')
                    ->nullable()
                    ->numeric()
                    ->minValue(0),

                Forms\Components\TextInput::make('daily_rate')
                    ->label('Daily Rate')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                Forms\Components\Toggle::make('is_available')
                    ->label('Is Available')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vehicle_id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('make')
                    ->label('Make')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('model')
                    ->label('Model')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('year')
                    ->label('Year')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('url')
                    ->label('Images')
                    ->height(50)
                    ->width(50)
                    ->disk('public')  // Specify the disk
                    ->visibility('public'),

                TextColumn::make('color')
                    ->label('Color')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('registration_number')
                    ->label('Registration Number')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('mileage')
                    ->label('Mileage')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('daily_rate')
                    ->label('Daily Rate')
                    ->sortable()
                    ->searchable()
                    ->money('USD'),

                IconColumn::make('is_available')
                    ->label('Available')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}