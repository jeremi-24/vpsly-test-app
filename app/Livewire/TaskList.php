<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\AppLog;
use Livewire\Component;

class TaskList extends Component
{
    public $title = '';

    public function addTask()
    {
        $this->validate([
            'title' => 'required|min:3'
        ]);

        $task = Task::create([
            'title' => $this->title,
            'is_completed' => false
        ]);

        AppLog::create([
            'action' => 'TASK_CREATED',
            'message' => "Nouvelle tâche créée: {$this->title}",
            'meta' => ['task_id' => $task->id]
        ]);

        $this->title = '';
    }

    public function toggleTask($id)
    {
        $task = Task::find($id);
        $task->is_completed = !$task->is_completed;
        $task->save();

        AppLog::create([
            'action' => 'TASK_TOGGLED',
            'message' => "Statut de la tâche #{$id} modifié",
            'meta' => ['task_id' => $id, 'completed' => $task->is_completed]
        ]);
    }

    public function deleteTask($id)
    {
        Task::destroy($id);

        AppLog::create([
            'action' => 'TASK_DELETED',
            'message' => "Tâche #{$id} supprimée",
            'meta' => ['task_id' => $id]
        ]);
    }

    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => Task::latest()->get()
        ]);
    }
}
