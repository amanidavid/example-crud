<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Work;
use App\Models\User;
use App\Models\task_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskComponent extends Component
{
    public $task_name, $description,$start_date,$due_date,$assignees;
    public $result,$task;

   public  $output = [];

    protected $rules = [

        'task_name' =>'string|required|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'description' =>'string|required|max:250|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|nullable',
        'start_date' => 'required|date',
        'due_date' => 'required|date|after_or_equal:start_date',
        'assignees' => 'required|array'
    ];


    public function save(){
        // dd($this->task_name, $this->description, $this->start_date, $this->due_date, $this->assignees);
        // dd($this->assignees);
        $this->validate();

        //check for existing task

        
        // Create new task
        $task = Work::create([
            'task_name' => $this->task_name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'status' => 'incomplete',
            'created_by' => Auth::id(),
        ]); 

       // Assign users to the task
        if (!empty($this->assignees)) {
            $task->assignees()->attach($this->assignees);
        }

        session()->flash('message', "Task created and users assigned successfully.");
        

        // Optionally clear the input fields after saving
        $this->task_name ='';
        $this->description ='';
        $this->start_date ='';
        $this->due_date ='';
        $this->assignees ='';

        $this->redirect('/dashboard');

        }

    public function mount(){
        
        $userId =auth()->id();
         // assign task to only worker supervising
         $this->output=DB::table('task_delegations')
         ->join('users As supervisor','task_delegations.supervisor','supervisor.id')
         ->join('users As user_supervised','task_delegations.user_supervised','user_supervised.id')
         ->where('supervisor.id', $userId)
         ->select('user_supervised.id','user_supervised.name')
         ->get();
   
    }
    

    public function render()
    {
        return view('livewire.task-component');
    }

}
