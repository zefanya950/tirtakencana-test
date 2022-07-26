<?php

namespace App\Imports;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportTabelD implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableD([
            'kode_sales' => $row['kode_sales'],
            'nama_sales' => $row['nama_sales'],
        ]);
    }
}
