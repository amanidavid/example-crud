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
