<?php

namespace App\Imports;

use App\FileManage;
use Maatwebsite\Excel\Concerns\ToModel;

class FileManage implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FileManage([
            // 'file_name' => 
        ]);
    }
}
