<?php

namespace App\Livewire;

use Livewire\Component;
use Mail;
use App\Mail\MainEmail;

class EmailComponent extends Component
{
    public function render()
    {
        return view('livewire.email-component');
    }
}
