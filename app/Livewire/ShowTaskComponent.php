<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Work;
use App\Models\User;
use App\Models\task_user;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class ShowTaskComponent extends Component
{
   
    public $editTaskId = null;  // Initialize with null
    public $editTaskName = '';
    public $task_name;
    public $errorMessage;
    public $task;
    
    public  $description,$start_date,$due_date,$assignees;
  
    public $result;
    protected $rules = [
        'task_name' =>'string|required|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
    ];
 

    public function render()
    {
        
        return view('livewire.show-task-component',);
    }

    public function mount(){
        $this->task = task_user::join('works','task_users.works_id','works.id')
        ->join('users AS assignee','task_users.user_id','assignee.id')
        ->select('works.task_name','works.description','works.start_date','works.due_date','works.status','Assignee.name AS assignee')
        ->get();


      
    }
    
    public function markAsRead($id)
    {
        $task = Task::find($id);
        if ($task) {
    
                $task->complete = true;
                $task->save();

        $this->mount();

          
        }
    }

    public function delete( Task $task)
    {  
    
        $task->delete();
        // return redirect()->route('dashboard'); 
        $this->mount();

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
            
        session()->flash('error', "A task named '$this->editTaskName' already exists.");
        }else{
            
        if ($task) {
            $task->task_name = $this->editTaskName;
            $task->complete = false; 
            $task->save();

            // Reset the edit fields
            $this->editTaskId = null;
            // $this ->editTaskName = '';
        }

        // return redirect()->route('dashboard');
        }


    }
}
