<?php

namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ExcelImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Excel([
            //
            'title'        => trim($row['title']),
            'description'  => trim($row['description']),
            'start_date'   => \Carbon\Carbon::parse($row['start_date']),
            
       
        ]);
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'description' => 'required|string|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'start_date'  => 'required|date',
           
        ];
    }
}
