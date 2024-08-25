<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTaskComponent extends Component

{
    use WithFileUploads;
    public $file, $output;

    protected $rules = [
        'file' => 'required|mimes:xlsx|max:10240', // 10MB Max
    ];

    public function render()
    {
        
        return view('livewire.my-task-component');
    }

    public function mount(){
        $this->import();
    }

    public function import()
    {
        $this->validate();

        try {
          $this->output =  Excel::import(new ExcelImport, $this->file->getRealPath());
          dd($this->output);
            session()->flash('message', 'Works imported successfully!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // Handle validation exceptions and provide feedback
            $errors = $e->failures();
            session()->flash('error', 'Some rows failed validation. Please check the file.');
        } catch (\Exception $e) {
            // Handle other exceptions
            session()->flash('error', 'An error occurred during import.');
        }

    }

   

}
