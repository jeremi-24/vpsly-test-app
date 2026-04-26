<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VPSly Pro |vvfvv</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body {
            background: radial-gradient(circle at top left, #0f172a 0%, #020617 100%);
            font-family: 'Inter', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>

    @livewireStyles
</head>

<body class="text-slate-200 min-h-screen selection:bg-blue-500/30">

    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Header -->
        <header class="mb-12 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-bold tracking-tight text-white mb-2">
                    System <span class="text-blue-500">Dashboard</span>
                </h1>
                <p class="text-blue-400 font-bold animate-pulse">etat stable! </p>
            </div>
            <div class="text-right">
                <span
                    class="px-3 py-1 bg-green-500/10 text-green-400 rounded-full text-xs font-bold uppercase tracking-wider border border-green-500/20">
                    ● Production Live
                </span>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content: Task List -->
            <div class="lg:col-span-2 space-y-8">
                <livewire:task-list />
            </div>

            <!-- Sidebar: Stats & Env -->
            <aside class="space-y-8">
                <!-- Server Info Card -->
                <div class="glass p-6 rounded-3xl">
                    <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        VPSly Engine Status
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-slate-400">Memory Usage</span>
                                <span class="text-slate-200">128MB / 512MB</span>
                            </div>
                            <div class="w-full bg-white/5 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 25%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-slate-400">CPU Load</span>
                                <span class="text-slate-200">12%</span>
                            </div>
                            <div class="w-full bg-white/5 rounded-full h-1.5">
                                <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 12%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- App Environment Card -->
                <div class="glass p-6 rounded-3xl">
                    <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                            </path>
                        </svg>
                        Environment
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="text-xs text-slate-400">APP_ENV</span>
                            <span class="text-xs font-mono text-amber-400">{{ config('app.env') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="text-xs text-slate-400">DATABASE</span>
                            <span
                                class="text-xs font-mono text-blue-400">{{ DB::connection()->getDatabaseName() }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5">
                            <span class="text-xs text-slate-400">DOMAIN</span>
                            <span class="text-xs font-mono text-slate-300">{{ request()->getHost() }}</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    @livewireScripts
</body>

</html>