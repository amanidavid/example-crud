<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;
// use Excel;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Storage;
// use App\Models\Excel;

class MyTaskComponent extends Component

{
    use WithFileUploads;
    public $file, $output;

    protected $rules = [
        
        'file' => 'required|file|mimes:xlsx,xls,csv|max:10240', // 10MB Max
    ];

    public function render()
    {
        
        return view('livewire.my-task-component');
    }

  

    public function import()
    {
        $this->validate();

        try {
            // dd($this->file->getRealPath());
            // $importResult = Excel::import(new ExcelImport, $this->file->getRealPath());
       // Store the file in the public disk
       $filePath = $this->file->storeAs('public', 'import-users.xlsx');
       $fullPath = Storage::path($filePath);

       // Import data using the import method
       Excel::import(new ExcelImport, $fullPath);
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
