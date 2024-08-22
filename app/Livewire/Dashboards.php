<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Work;
use App\Models\User;
use App\Models\task_user;
use Illuminate\Support\Facades\Mail;
use App\Mail\MainEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dashboards extends Component

{
    public $task_name, $description,$start_date,$due_date,$assignees;
    public $results,$statuses,$mytask,$task,$remove, $edit_task;
    public  $output = [];

   protected $rules = [

       'task_name' =>'string|required|max:100|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
       'description' =>'string|required|max:250|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|nullable',
       'start_date' => 'required|date',
       'due_date' => 'required|date|after_or_equal:start_date',
       'assignees' => 'required|array'
   ];

    public function render()
    {
        return view('livewire.dashboards');
    }

    public function mount(){
        //call fetchDataFxn
        $this->fetchDataFxn();
       $this->assignedTask();
       $this->supervisorTask();
    //    $this->update();
      
     

    }
    
    public function fetchDataFxn(){
        //pull data from database

        $userId =auth()->id();
        // assign task to only worker supervising
        $this->output=DB::table('task_delegations')
        ->join('users As supervisor','task_delegations.supervisor','supervisor.id')
        ->join('users As user_supervised','task_delegations.user_supervised','user_supervised.id')
        ->where('supervisor.id', $userId)
        ->select('user_supervised.id','user_supervised.name')
        ->get();

        //retrieve data for all task
        $this->task = task_user::join('works','task_users.works_id','works.id')
        ->join('users AS assignee','task_users.user_id','assignee.id')
        ->select('works.task_name','works.description','works.start_date','works.due_date','works.status','Assignee.name AS assignee')
        ->orderByRaw("CASE 
        WHEN works.status = 'incomplete' THEN 1
        WHEN works.status = 'doing' THEN 2
        WHEN works.status = 'complete' THEN 3
        ELSE 4
        END")
        ->orderBy('works.due_date','asc')
        ->get();
    }

    public function saveDataFxn(){
        //save
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

       // Assign users to the task
        if (!empty($this->assignees)) {
            $task->assignees()->attach($this->assignees);

            $assigneesEmails = DB::table('task_users')
            ->join('users', 'task_users.user_id', '=', 'users.id')
            ->where('task_users.works_id', $task->id)
            ->pluck('users.email') // Retrieve the email addresses
            ->toArray(); // Convert to array

            // Send email to each assignee if emails are found
            foreach ($assigneesEmails as $email) {
                // Mail::to($email)->send(new MainEmail($task,$assignerName));
                try {
                    Mail::to($email)->send(new MainEmail($task, $assignerName));
                } catch (\Exception $e) {
    
                    // Optionally, you can store a message in the session or display it to the user
                    session()->flash('error', "Failed to send email to some or all assignees. Please check your internet connection and try again.");
                }
            }
        }
 
        // Optionally clear the input fields after saving
        $this->task_name ='';
        $this->description ='';
        $this->start_date ='';
        $this->due_date ='';
        $this->assignees ='';

        //call fetchDataFxn
        $this->fetchDataFxn();
        $this->redirect('/dashboard');
        
           
        session()->flash('message', "Task created and users assigned successfully.");


    }

    public function assignedTask(){

        $userId = auth()->id(); // Get the logged-in user's ID
        
        $this->results = DB::table('task_users')
            ->join('works', 'task_users.works_id', '=', 'works.id')
            ->join('users as assignee', 'task_users.user_id', '=', 'assignee.id')
            ->join('users as assigner', 'works.created_by', '=', 'assigner.id')
            ->select('works.id',
                'works.task_name',
                'works.description',
                'works.start_date',
                'works.due_date',
                'works.status',
                'assigner.name as assigner',
                'assignee.name as assignee'
            )
            ->where('assignee.id', $userId)
            ->orderByRaw("CASE 
            WHEN works.status = 'incomplete' THEN 1
            WHEN works.status = 'doing' THEN 2
            WHEN works.status = 'complete' THEN 3
            ELSE 4
            END")
            ->orderBy('works.due_date','asc') // Filter by the logged-in user's ID
            ->get();

            // dd($this->results);
    
    
        // Define the possible statuses
        $this->statuses = ['incomplete', 'doing', 'completed'];
       

    }

    public function updateStatus($taskId, $newStatus)
    {
        DB::table('works')->where('id', $taskId)->update(['status' => $newStatus]);
        $this->fetchDataFxn();
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
        
        $this->fetchDataFxn();
        
    }

    public function delete($id){

     $this->remove= Work::find($id);
     $this->remove->delete();
    //  $this->fetchDataFxn();
    $this->redirect('/dashboard');

    session()->flash('sms', "Task deleted successfully.");

    

    }

    public function edit($task_id)
    {
        $this->edit_task = Work::find($task_id);

    }

    // public function update()
    // {
    //     // $this->validate();

    //    // Create new task
    //    $this->task = Work::create([
    //     'task_name' => $this->task_name,
    //     'description' => $this->description,
    //     'start_date' => $this->start_date,
    //     'due_date' => $this->due_date,
    //     'status' => 'incomplete',
    //     'created_by' => Auth::id(),
    // ]);

    //     // Sync the assignees (users) with the task
    //     if (!empty($this->assignees)) {
    //         $task->assignees()->attach($this->assignees);}

    //     // Hide the modal and reset the form
       
    //     session()->flash('message', 'Task updated successfully!');
    // }


}
