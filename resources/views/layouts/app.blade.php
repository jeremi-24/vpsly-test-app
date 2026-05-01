<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockMaster - VPSly Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .btn-primary { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); transition: all 0.3s ease; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4); }
    </style>
</head>
<body class="min-h-screen bg-slate-950">
    <nav class="glass sticky top-0 z-50 px-6 py-4 mb-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center font-bold text-white">S</div>
                <span class="text-xl font-bold tracking-tight">StockMaster <span class="text-blue-500">.</span></span>
            </div>
            <div class="flex gap-6 text-sm font-medium text-slate-400">
                <a href="{{ route('products.index') }}" class="hover:text-white transition-colors">Dashboard</a>
                <a href="#" class="hover:text-white transition-colors opacity-50">Analytics</a>
                <a href="#" class="hover:text-white transition-colors opacity-50">Settings</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pb-12">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-auto py-8 text-center text-slate-600 text-sm border-t border-slate-900">
        &copy; 2026 StockMaster - Deployed with <span class="text-blue-500 font-semibold">VPSly</span>
    </footer>
</body>
</html>
