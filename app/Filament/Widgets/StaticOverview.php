<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Vehicle;
use App\Models\Reservation;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalCars = Vehicle::count();
        $availableCars = Vehicle::where('is_available', true)->count();
        $underMaintenance = Vehicle::where('is_available', false)->count();// Assuming a 'status' column exists
        $monthlyIncome = Reservation::where('status', 'completed')
            ->whereMonth('start_date', now()->month)
            ->sum('total_cost');

        return [
            Stat::make('Total Cars', $totalCars),
            Stat::make('Available Cars', $availableCars),
            Stat::make('Under Maintenance', $underMaintenance),
            Stat::make('Monthly Income', 'Rs.' . number_format($monthlyIncome, 2)),
        ];
    }
}
