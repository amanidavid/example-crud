<?php

namespace App\Livewire;
use App\Models\task_user;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class DemoComponent extends Component
{
    public $task = []; 
    public $task_name, $description,$start_date,$due_date,$assignees;
    public $results,$statuses,$mytask,$remove, $edit_task,  $task_update;
    
    public $toEdit;

    public $output = [];
    public $userId;

    protected $rules = [
        'task_name' =>'string|required|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'description' =>'string|required|max:250|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|nullable',
        'start_date' => 'required|date',
        'due_date' => 'required|date|after_or_equal:start_date',
        'assignees' => 'required|array'
    ];

    public function render()
    {
        return view('livewire.demo-component');
    }

    public function mount(){
        $this->userId = auth()->id();
        $this->fetchAllDatas();
        // dd($this->task[1]);
    }

    public function fetchAllDatas(){
        //retrieve data for all task
        $this->task = task_user::join('works','task_users.works_id','works.id')
            ->join('users AS assignee','task_users.user_id','assignee.id')
            ->select('works.id','works.task_name','works.description','works.start_date','works.due_date','works.status','Assignee.name AS assignee')
            ->orderByRaw("CASE 
            WHEN works.status = 'incomplete' THEN 1
            WHEN works.status = 'doing' THEN 2
            WHEN works.status = 'complete' THEN 3
            ELSE 4
            END")
            ->orderBy('works.due_date','asc')
        ->get();
        
        $this->output=DB::table('task_delegations')
            ->join('users As supervisor','task_delegations.supervisor','supervisor.id')
            ->join('users As user_supervised','task_delegations.user_supervised','user_supervised.id')
            ->where('supervisor.id', $this->userId)
            ->select('user_supervised.id','user_supervised.name')
        ->get();     
    }

    
    public function saveDataFxn(){
        $this->validate();

        $assignerName = Auth::user()->name;

        // Create new task
        $task = Work::create([
            'task_name' => $this->task_name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'status' => 'incomplete',
            'created_by' => Auth::id(),
        ]); 

        $task->assignees()->attach($this->assignees);
      
        $this->fetchAllDatas();

    }

    
    public function deleted($id)
    {    
        $remove = Work::find($id);
        
        if ($remove) {
            $remove->delete();
            // session()->flash('sms', "Task deleted successfully.");
            $this->fetchAllDatas();
        } else {
            // session()->flash('error', "Task not found.");
        }
    }

    public function toEditFxn($index){
        
        $this->toEdit = $index;
        // dd($this->toEdit['task_name']);
    }

}
