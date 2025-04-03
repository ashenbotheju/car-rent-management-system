<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                       
                    // User ID (dropdown or text input)
            TextInput::make('user.name')
            ->label('User ID')
            ->numeric()
            ->required(),

        // Vehicle ID (dropdown or text input)
        TextInput::make('vehicle_id')
            ->label('Vehicle ID')
            ->numeric()
            ->required(),

        // Start Date
        DatePicker::make('start_date')
            ->label('Start Date')
            ->required(),

        // End Date
        DatePicker::make('end_date')
            ->label('End Date')
            ->required(),

        // Total Cost
        TextInput::make('total_cost')
            ->label('Total Cost')
            ->numeric()
            ->required(),

        // Status (dropdown)
        Select::make('status')
            ->label('Status')
            ->options([
                'pending' => 'Pending',
                'confirmed' => 'Confirmed',
                'cancelled' => 'Cancelled',
            ])
            ->default('pending')
            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                  // Reservation ID
                  TextColumn::make('reservation_id')
                  ->label('Reservation ID')
                  ->sortable()
                  ->searchable(),
  
              // User ID
              TextColumn::make('user.name')
                  ->label('User ID')
                  ->sortable()
                  ->searchable(),
  
              // Vehicle ID
              TextColumn::make('vehicle.model')
                  ->label('Vehicle ID')
                  ->sortable()
                  ->searchable(),
  
              // Start Date
              TextColumn::make('start_date')
                  ->label('Start Date')
                  ->date()
                  ->sortable(),
  
              // End Date
              TextColumn::make('end_date')
                  ->label('End Date')
                  ->date()
                  ->sortable(),
  
              // Total Cost
              TextColumn::make('total_cost')
                  ->label('Total Cost')
                  ->money('USD') // Format as currency
                  ->sortable(),
  
              // Status
              TextColumn::make('status')
                  ->label('Status')
                  ->badge()
                  ->color(fn (string $state): string => match ($state) {
                      'pending' => 'warning',
                      'confirmed' => 'success',
                      'cancelled' => 'danger',
                  }),
            ])
            ->filters([
                //
                Filter::make('status')
                ->label('Show Maintenance Vehicles')
                ->query(fn (Builder $query) => $query->where('status', 'confirmed'))
       
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
