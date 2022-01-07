<?php

namespace App\Imports;

use App\Training;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new Training([
            'simpanan' => $row[0],
            'pinjaman' => $row[1],
            'cicilan' => $row[2],
            'keperluan' => $row[3],
            'status' => $row[4],
        ]);
    }
}
