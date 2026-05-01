@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('products.index') }}" class="w-10 h-10 glass rounded-full flex items-center justify-center hover:bg-slate-800 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-3xl font-bold">Modifier <span class="text-blue-500">{{ $product->name }}</span></h1>
    </div>

    <form action="{{ route('products.update', $product) }}" method="POST" class="glass p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div class="space-y-2">
            <label class="text-sm font-medium text-slate-400">Nom du produit</label>
            <input type="text" name="name" value="{{ $product->name }}" required 
                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all">
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-400">Catégorie</label>
                <input type="text" name="category" value="{{ $product->category }}" required 
                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-400">Quantité en stock</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" required min="0"
                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-sm font-medium text-slate-400">Prix Unitaire (€)</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" required min="0"
                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-sm font-medium text-slate-400">Description (Optionnel)</label>
            <textarea name="description" rows="3" 
                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all">{{ $product->description }}</textarea>
        </div>

        <button type="submit" class="btn-primary w-full py-4 rounded-xl font-bold text-lg">
            Mettre à jour
        </button>
    </form>
</div>
@endsection
