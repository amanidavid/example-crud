<?php

namespace App\Observers;

use App\Models\work;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MainEmail;

class EmailObserver
{
    /**
     * Handle the work "created" event.
     */
    public function created(work $task): void
    {
    
    //   Mail::to('leowande97@gmail.com')->send(new MainEmail(Work::first()));
       // Debug task ID and assignees relationship
       dd([
        'task_id' => $task->id,
        'assignees' => $task->assignees()->pluck('email')->toArray()
    ]);
        $assignees = User::whereHas('assignedTasks', function ($query) use ($task) {
            $query->where('works_id', $task->id);
        })->get();
        dd($assignees); 

        foreach ($assignees as $assignee) {
            if ($assignee instanceof User && $assignee->email) {
                Mail::to($assignee->email)->send(new MainEmail($task));
            }
        }

       

    
    }

    /**
     * Handle the work "updated" event.
     */
    public function updated(work $work): void
    {
        //
    }

    /**
     * Handle the work "deleted" event.
     */
    public function deleted(work $work): void
    {
        //
    }

    /**
     * Handle the work "restored" event.
     */
    public function restored(work $work): void
    {
        //
    }

    /**
     * Handle the work "force deleted" event.
     */
    public function forceDeleted(work $work): void
    {
        //
    }
}
