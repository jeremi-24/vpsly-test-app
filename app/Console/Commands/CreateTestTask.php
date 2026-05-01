<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\AppLog;

class CreateTestTask extends Command
{
    protected $signature = 'test:create-task';
    protected $description = 'Crée une tâche de test via Cron';

    public function handle()
    {
        $title = "Tâche auto " . now()->format('H:i:s');
        
        $task = Task::create([
            'title' => $title,
            'is_completed' => false
        ]);

        AppLog::create([
            'action' => 'TASK_CREATED_BY_CRON',
            'message' => "Cron a créé la tâche: {$title}",
            'meta' => ['task_id' => $task->id]
        ]);

        $this->info("Tâche créée : {$title}");
    }
}
