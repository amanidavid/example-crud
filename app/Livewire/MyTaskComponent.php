<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Work;
use App\Models\User;
use App\Models\task_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTaskComponent extends Component

{
    // public $result, $user;
    // public $statuses;
    // public $task_name, $description,$start_date,$due_date,$assigner,$assignee;

    public function render()
    {
        
        return view('livewire.my-task-component');
    }

    public function mount(){


    // $userId = auth()->id(); // Get the logged-in user's ID

    // $this->result = DB::table('task_users')
    //     ->join('works', 'task_users.works_id', '=', 'works.id')
    //     ->join('users as assignee', 'task_users.user_id', '=', 'assignee.id')
    //     ->join('users as assigner', 'works.created_by', '=', 'assigner.id')
    //     ->select('works.id',
    //         'works.task_name',
    //         'works.description',
    //         'works.start_date',
    //         'works.due_date',
    //         'works.status',
    //         'assigner.name as assigner',
    //         'assignee.name as assignee'
    //     )
    //     ->where('assignee.id', $userId) // Filter by the logged-in user's ID
    //     ->get();


    // // Define the possible statuses
    // $this->statuses = ['incomplete', 'doing', 'completed'];
    }

//     public function updateStatus($taskId, $newStatus)
// {
//     DB::table('works')->where('id', $taskId)->update(['status' => $newStatus]);
// }

}
