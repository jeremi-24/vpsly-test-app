<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
         VPSly Task Test
    </h2>

    <div class="flex gap-2 mb-8">
        <input 
            type="text" 
            wire:model="title" 
            wire:keydown.enter="addTask"
            placeholder="Nouvelle tâche..." 
            class="flex-1 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm"
        >
        <button 
            wire:click="addTask"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-colors text-sm"
        >
            Ajouter
        </button>
    </div>

    <div class="space-y-3">
        @foreach($tasks as $task)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg group transition-all hover:bg-gray-100">
                <div class="flex items-center gap-3">
                    <input 
                        type="checkbox" 
                        wire:click="toggleTask({{ $task->id }})" 
                        {{ $task->is_completed ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500"
                    >
                    <span class="text-sm {{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-700 font-medium' }}">
                        {{ $task->title }}
                    </span>
                </div>
                <button 
                    wire:click="deleteTask({{ $task->id }})"
                    class="text-gray-300 hover:text-red-500 transition-colors"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        @endforeach

        @if(count($tasks) === 0)
            <div class="text-center py-6 text-gray-400 text-xs italic">
                Aucune tâche. VPSly attend tes données !
            </div>
        @endif
    </div>
    
    <div class="mt-8 pt-4 border-t border-gray-100 flex items-center justify-between text-[10px] text-gray-400 uppercase tracking-widest font-bold">
        <span>Statut DB: 
            <span class="{{ DB::connection()->getDatabaseName() ? 'text-green-500' : 'text-red-500' }}">
                {{ DB::connection()->getDatabaseName() ? 'Connectée' : 'Erreur' }}
            </span>
        </span>
        <span>Build: Livewire 3</span>
    </div>
</div>
