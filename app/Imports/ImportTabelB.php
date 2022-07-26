<?php

namespace App\Imports;

use App\Models\TableB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportTabelB implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableB([
            'kode_toko' => $row['kode_toko'],
            'nominal_transaksi' => $row['nominal_transaksi'],
        ]);
    }
}
