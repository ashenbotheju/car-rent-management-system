<!-- resources/views/reports/daily-revenue.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daily Revenue Report</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .print-button { margin-bottom: 20px; }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
    <h2>Daily Revenue Report</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Revenue (LKR)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->day }}</td>
                    <td>Rs. {{ number_format($record->revenue, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
