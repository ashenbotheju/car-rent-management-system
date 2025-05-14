<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Reservation;
use App\Models\Vehicle;

class DemandBarchart extends ChartWidget
{
    protected static ?string $heading = 'Most Demanded Vehicles';

    protected function getData(): array
    {
        // Fetch the most reserved vehicles and their reservation counts
        $data = Reservation::select('vehicle_id')
            ->with('vehicle') // Assuming a relationship exists between Reservation and Vehicle
            ->groupBy('vehicle_id')
            ->selectRaw('vehicle_id, COUNT(*) as count')
            ->orderByDesc('count')
            ->take(5) // Limit to top 5 most reserved vehicles
            ->get();

        return [
            'labels' => $data->map(fn($item) => $item->vehicle->brand . ' ' . $item->vehicle->model)->toArray(),
            'datasets' => [
            [
                'label' => 'Reservations',
                'data' => $data->pluck('count')->map(fn($count) => intval($count))->toArray(),
            ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
