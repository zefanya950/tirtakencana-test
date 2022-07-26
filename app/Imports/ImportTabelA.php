<?php

namespace App\Imports;

use App\Models\TableA;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ImportTabelA implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableA([
            'kode_baru' => $row['kode_baru'],
            'kode_lama' => $row['kode_lama'],
        ]);
    }
}
