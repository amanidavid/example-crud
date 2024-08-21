<?php

namespace App\Observers;

use App\Models\Work;
use App\Models\User;
use Emanate\BeemSms\Facades\BeemSms;

class TaskObserver
{
    /**
     * Handle the Work "created" event.
     */
    public function created(Work $work): void
    {
        //

        $userIds = $work->assignees->pluck('id');

        // Fetch the phone numbers of these users $phoneNumbers = User::whereIn('id', $userIds)
        $phoneNumbers = User::whereIn('id', $userIds)
        ->join('telephones', 'users.id', '=', 'telephones.user_id') 
        ->pluck('telephones.phone_number') 
        ->toArray(); // Convert to array

        BeemSms::content(" A new task $work->task_name has been assigned to you")
        ->getRecipients($phoneNumbers)
        ->send();
      
    }

    /**
     * Handle the Work "updated" event.
     */
    public function updated(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "deleted" event.
     */
    public function deleted(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "restored" event.
     */
    public function restored(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "force deleted" event.
     */
    public function forceDeleted(Work $work): void
    {
        //
    }
}
