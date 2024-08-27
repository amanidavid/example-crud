<?php

namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
// use Maatwebsite\Excel\Concerns\ShouldQueue;

class ExcelImport implements ToArray, WithValidation, WithHeadingRow, WithChunkReading
{
    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function array(array $row)
    {
        dd($rows);
        // foreach ($rows as $row) {
        //     // Create a new instance of the model for each row
        //     Excel::create([
        //         'title' => $row['title'],
        //         'description' => $row['description'],
        //         'start_date' => Carbon::parse($row['start_date']),
        //     ]);
        // }
       
    //   return new Excel([
    //         //
    //         'title'=> $row['title'],
    //         'description'=> $row['description'],
    //         'start_date'=>Carbon::parse($row['start_date']),
            
           
    //     ]);

      
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'description' => 'required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'start_date'  => 'required|date',
           
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
