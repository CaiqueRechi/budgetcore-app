<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'BudgetCore' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-shell h-full">
    <div class="min-h-screen lg:grid lg:grid-cols-[280px_1fr]">
        @include('partials.sidebar')

        <div class="min-w-0">
            @include('partials.topbar')

            <main class="p-4 sm:p-6 lg:p-8">
                {{ $slot ?? '' }}

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
