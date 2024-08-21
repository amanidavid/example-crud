<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Work;
use App\Models\User;
use App\Models\task_user;
use App\Models\Task_delegation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\Access\AuthorizationException;

class SupervisorComponent extends Component
{
    public $mytask,$task;
    public function render()
    {
        return view('livewire.supervisor-component');
    }

    public function mount(){

        $userId =auth()->id();
         // Task create by supervisor
         $this->mytask=DB::table('task_users')
         // ->join('works','task_users.works_id','works.id')
         ->join('works', 'task_users.works_id', '=', 'works.id')
         ->join('users AS assignee', 'task_users.user_id', '=', 'assignee.id')
         ->join('users AS supervisor','works.created_by','supervisor.id')
         ->where('supervisor.id',$userId)
         ->select('works.id','works.task_name','works.description','works.start_date','works.due_date','works.status','assignee.name AS assignee')
         ->get();
    }

    public function delete( $id)
    {
        
        $task = Work::find($id);
 
        $task->delete();
        $this->mount();


        // // Ensure the user is authorized to delete the task
        // $userId = auth()->id();
    
        // // Find the task that matches the user's criteria
        // $this->task = DB::table('task_users')
        //     ->join('works', 'task_users.works_id', '=', 'works.id')
        //     ->join('users AS supervisor', 'works.created_by', '=', 'supervisor.id')
        //     ->where('supervisor.id', $userId)
        //     ->where('works.id', $taskId)
        //     ->first();
    
        // if ($this->task) {
        //     // Perform the delete operation
        //     DB::table('works')
        //         ->where('id', $taskId)
        //         ->delete();
    
        //     // Optionally, you can also delete the associated entries in 'task_users'
        //     DB::table('task_users')
        //         ->where('works_id', $taskId)
        //         ->delete();
    
        //     // Update the Livewire component's property
        //     $this->mount(); // Re-fetch the tasks to reflect the changes
        // } else {
        //     // Handle the case where the task is not found or user is not authorized        
        //     $this->redirect('/dashboard');

        // }
    }
}
