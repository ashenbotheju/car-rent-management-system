<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DailyIncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Daily Income (This Month)';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Get the first and last day of the current month
        $firstDay = Carbon::now()->startOfMonth();
        $lastDay = Carbon::now()->endOfMonth();

        // Initialize daily income array for the entire month
        $days = [];
        $dailyIncomeData = [];

        for ($i = 1; $i <= $lastDay->day; $i++) {
            $date = Carbon::now()->format('Y-m') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
            $days[] = (string) $i; // X-axis labels: 1, 2, 3, ..., 31
            $dailyIncomeData[$date] = 0; // Default daily income is 0
        }

        // Fetch daily income from the database
        $dailyResults = DB::table('reservations')
            ->selectRaw("DATE(created_at) AS day, SUM(total_cost) AS daily_income")
            ->where('status', 'confirmed')
            ->whereBetween('created_at', [$firstDay, $lastDay])
            ->groupBy('day')
            ->get();

        // Assign fetched income data to respective days
        foreach ($dailyResults as $row) {
            if (isset($dailyIncomeData[$row->day])) {
                $dailyIncomeData[$row->day] = (float) $row->daily_income;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Daily Income',
                    'data' => array_values($dailyIncomeData), // Fill data dynamically
                    'borderColor' => '#FF5733', // Orange
                    'backgroundColor' => 'rgba(255, 87, 51, 0.2)',
                ],
            ],
            'labels' => $days, // Labels: 1 to 31
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
