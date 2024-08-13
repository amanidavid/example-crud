<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskComponent extends Component
{
    public $task_name;
    public $result;

    protected $rules = [
        'task_name' =>'string|required|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'
    ];


    public function save(){

        $this->validate();

        //check for existing task

        $existTask = Task::where('task_name',$this->task_name)->first();

        if($existTask){
            
            session()->flash('error', "A task $this->task_name already exists.");
        }else{
            $result = Task::create([
                'task_name'=>$this->task_name
            ]); 

            
            if($result->save()){
                session()->flash('message', "A task created successfully.");
            }
             // Optionally clear the input field after saving
            $this->task_name = '';

        }
        }


    

    public function render()
    {
        return view('livewire.task-component');
    }

}
