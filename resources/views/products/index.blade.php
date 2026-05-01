@extends('layouts.app')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold mb-2">Inventaire Global</h1>
        <p class="text-slate-400">Gérez vos produits et surveillez vos niveaux de stock en temps réel.</p>
    </div>
    <a href="{{ route('products.create') }}" class="btn-primary px-6 py-3 rounded-xl font-semibold flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Nouveau Produit
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="glass p-6 rounded-2xl">
        <div class="text-slate-400 text-sm font-medium mb-1">Total Produits</div>
        <div class="text-4xl font-bold">{{ $products->count() }}</div>
    </div>
    <div class="glass p-6 rounded-2xl">
        <div class="text-slate-400 text-sm font-medium mb-1">Stock Faible</div>
        <div class="text-4xl font-bold text-orange-500">{{ $products->where('quantity', '<', 5)->count() }}</div>
    </div>
    <div class="glass p-6 rounded-2xl">
        <div class="text-slate-400 text-sm font-medium mb-1">Valeur Totale</div>
        <div class="text-4xl font-bold text-blue-500">{{ number_format($products->sum(fn($p) => $p->price * $p->quantity), 2) }} €</div>
    </div>
</div>

<div class="glass rounded-2xl overflow-hidden">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-slate-900/50 text-slate-400 text-xs uppercase tracking-wider">
                <th class="px-6 py-4">Produit</th>
                <th class="px-6 py-4">Catégorie</th>
                <th class="px-6 py-4">Stock</th>
                <th class="px-6 py-4">Prix Unit.</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($products as $product)
            <tr class="hover:bg-slate-800/30 transition-colors">
                <td class="px-6 py-4">
                    <div class="font-semibold text-white">{{ $product->name }}</div>
                    <div class="text-xs text-slate-500 truncate max-w-[200px]">{{ $product->description ?? 'Aucune description' }}</div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-md bg-slate-800 text-slate-300 text-xs">{{ $product->category }}</span>
                </td>
                <td class="px-6 py-4">
                    @if($product->quantity < 5)
                        <span class="flex items-center gap-2 text-orange-500 font-medium">
                            <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                            {{ $product->quantity }} (Faible)
                        </span>
                    @else
                        <span class="text-emerald-500 font-medium">{{ $product->quantity }}</span>
                    @endif
                </td>
                <td class="px-6 py-4 font-mono text-slate-300">
                    {{ number_format($product->price, 2) }} €
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('products.edit', $product) }}" class="text-slate-400 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
                            @csrf @method('DELETE')
                            <button class="text-slate-400 hover:text-red-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-slate-500 italic">
                    Aucun produit trouvé. Commencez par en ajouter un !
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
