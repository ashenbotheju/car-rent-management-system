{{-- for testing purpose --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Test</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-300">
    <div class="flexitems-center justify-center min-h-screen container mx-auto ">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
            <x-car-card />
        </div>
        <x-footer />

    </div>

<body>
    <x-footer />
</body>
</html>
