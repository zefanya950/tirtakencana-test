<?php

namespace App\Exports;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TabelD implements FromView
{

    public function view() : View
    {
        $data = TableD::all();
        return view('table_d.export.excel', ['data' => $data]);
    }
}
