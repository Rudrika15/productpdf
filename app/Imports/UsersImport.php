<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;  // Add this line
use Maatwebsite\Excel\Concerns\Importable;     // Optionally for using the Importable trait, if needed

class UsersImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new User([
            'modelno' => $row['modelno'],
            'image' => $row['image'],
            'size' => $row['size'],
            'color' => $row['mrp'],
            'stock' => $row['stock'],
            'category' => $row['category'],
            'vendorsku' => $row['vendorsku'],
        ]);
    }
}
