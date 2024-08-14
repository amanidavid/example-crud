<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class BaseTaskComponent extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::select('id', 'task_name', 'complete')
            ->orderBy('complete', 'asc')
            ->get();
    }
}
