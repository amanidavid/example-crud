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
        $this->supervisorTask();
    }

    public function supervisorTask(){

        $userId =auth()->id();
        // Task create by supervisor
        $this->mytask=DB::table('task_users')
        // ->join('works','task_users.works_id','works.id')
        ->join('works', 'task_users.works_id', '=', 'works.id')
        ->join('users AS assignee', 'task_users.user_id', '=', 'assignee.id')
        ->join('users AS supervisor','works.created_by','supervisor.id')
        ->where('supervisor.id',$userId)
        ->select('works.id','works.task_name','works.description','works.start_date','works.due_date','works.status','assignee.name AS assignee')
        ->orderByRaw("CASE 
        WHEN works.status = 'incomplete' THEN 1
        WHEN works.status = 'doing' THEN 2
        WHEN works.status = 'complete' THEN 3
        ELSE 4
        END")
        ->orderBy('works.due_date','asc') 
        ->get(); 
        
        // $this->mount();
    
        
    }

    // public function delete($id){

    //     // $this->remove= Work::find($id);
    //     $remove = Work::find($id);
    //     $remove->delete();

    //    session()->flash('sms', "Task deleted successfully.");
    //    $this->supervisorTask();
   
    // }
}
