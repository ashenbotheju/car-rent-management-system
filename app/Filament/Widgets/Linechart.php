<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class Linechart extends ChartWidget
{
    protected static ?string $heading = 'Monthly Income';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Get the monthly income from the database
        $results = DB::table('reservations')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS month, DATE_FORMAT(created_at, '%M %Y') AS month_name, SUM(total_cost) AS monthly_income")
            ->where('status', 'confirmed')
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        // Initialize an array for months (ensuring all months are present)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $incomeData = array_fill(0, 12, 0); // Default all months to 0 income

        // Map database results to the respective month positions
        foreach ($results as $row) {
            $monthIndex = (int) date('m', strtotime($row->month)) - 1; // Convert 'YYYY-MM' to index
            $incomeData[$monthIndex] = (float) $row->monthly_income; // Assign income
        }

        return [
            'datasets' => [
                [
                    'label' => 'Monthly Income',
                    'data' => $incomeData, // Fill data dynamically
                    'borderColor' => '#4CAF50', // Green color for the line
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)', // Light green fill
                ],
            ],
            'labels' => $months, // Month labels from Jan to Dec
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
