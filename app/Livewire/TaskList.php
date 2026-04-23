<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskList extends Component
{
    public $title = '';

    public function addTask()
    {
        $this->validate([
            'title' => 'required|min:3'
        ]);

        Task::create([
            'title' => $this->title,
            'is_completed' => false
        ]);

        $this->title = '';
    }

    public function toggleTask($id)
    {
        $task = Task::find($id);
        $task->is_completed = !$task->is_completed;
        $task->save();
    }

    public function deleteTask($id)
    {
        Task::destroy($id);
    }

    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => Task::latest()->get()
        ]);
    }
}
