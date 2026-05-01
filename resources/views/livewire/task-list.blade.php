<div class="glass p-8 rounded-[2rem] shadow-2xl relative overflow-hidden">
    <!-- Decorative Glow -->
    <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-600/10 blur-[100px] rounded-full"></div>
    
    <div class="relative">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white tracking-tight flex items-center gap-3">
                <span class="w-2 h-8 bg-blue-500 rounded-full"></span>
                Task Manager
            </h2>
            <div class="flex items-center gap-2">
                 <div wire:loading class="animate-spin h-4 w-4 border-2 border-blue-500 border-t-transparent rounded-full"></div>
                 <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">Syncing...</span>
            </div>
        </div>

        <!-- Input Section -->
        <div class="relative mb-10">
            <input 
                type="text" 
                wire:model="title" 
                wire:keydown.enter="addTask"
                placeholder="What needs to be done?" 
                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-slate-200 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-all shadow-inner"
            >
            <button 
                wire:click="addTask"
                class="absolute right-2 top-2 bottom-2 px-6 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-xl transition-all active:scale-95 shadow-lg shadow-blue-600/20"
            >
                Add
            </button>
        </div>

        <!-- List Section -->
        <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
            @forelse($tasks as $task)
                <div class="group flex items-center justify-between p-4 bg-white/[0.02] hover:bg-white/[0.05] border border-white/5 rounded-2xl transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <label class="relative flex items-center cursor-pointer">
                            <input 
                                type="checkbox" 
                                wire:click="toggleTask({{ $task->id }})" 
                                {{ $task->is_completed ? 'checked' : '' }}
                                class="peer h-6 w-6 cursor-pointer appearance-none rounded-lg border border-white/20 bg-white/5 transition-all checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            >
                            <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </label>
                        <span class="text-sm transition-all {{ $task->is_completed ? 'line-through text-slate-500 opacity-50' : 'text-slate-200 font-medium' }}">
                            {{ $task->title }}
                        </span>
                    </div>
                    
                    <button 
                        wire:click="deleteTask({{ $task->id }})"
                        class="opacity-0 group-hover:opacity-100 p-2 text-slate-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-all"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center py-12 text-slate-500 italic">
                    <svg class="w-12 h-12 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    <p class="text-sm">No tasks found. Start by adding one above!</p>
                </div>
            @endforelse
        </div>

        <!-- Footer Stats -->
        <div class="mt-8 flex items-center justify-between text-[10px] text-slate-500 font-bold uppercase tracking-widest border-t border-white/5 pt-6">
            <div class="flex gap-4">
                <span>Total: <span class="text-slate-300">{{ count($tasks) }}</span></span>
                <span>Completed: <span class="text-blue-500">{{ $tasks->where('is_completed', true)->count() }}</span></span>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                Database Ready
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.02); }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(59, 130, 246, 0.2); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(59, 130, 246, 0.4); }
    </style>
</div>
