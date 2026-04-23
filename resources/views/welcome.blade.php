<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VPSly Test App</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
    </head>
    <body class="bg-gray-50 flex items-center justify-center min-h-screen">
        <livewire:task-list />
        @livewireScripts
    </body>
</html>
