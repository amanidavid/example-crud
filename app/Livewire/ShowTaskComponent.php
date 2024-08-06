<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class ShowTaskComponent extends Component
{
   
    public $editTaskId = null;  // Initialize with null
    public $editTaskName = '';
    public $task_name;

    public function render()
    {
        $task =Task::select('id','task_name','complete')
        ->orderby('complete','asc')
        ->get();
        return view('livewire.show-task-component',compact('task'));
    }

    

    public function markAsRead($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->complete = true;
            $task->save();
        }
        
        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
         Task::find($id)->delete();
         return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        if ($task) {
            $this->editTaskId = $task->id;
            $this->editTaskName = $task->task_name;
        }

    }

    public function update()
    {
        $this->validate([
            'editTaskName' => 'required|string|max:255',
        ]);
 // Check if the new task name already exists in the database, excluding the current task
        $existTask = Task::where('task_name', $this->editTaskName)
        ->where('id', '!=', $this->editTaskId)
        ->first();
        $task = Task::find($this->editTaskId);


        if($existTask){
            
            session()->flash('error', "A task $this->task_name already exists.");
        }else{
            
        if ($task) {
            $task->task_name = $this->editTaskName;
            $task->complete = false; 
            $task->save();

            // Reset the edit fields
            $this->editTaskId = null;
            $this ->editTaskName = '';
        }

        return redirect()->route('dashboard');
        }


    }
}
