<?php

namespace App\Exports;

use App\Models\TableC;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TabelC implements FromView
{

    public function view() : View
    {
        $data = TableC::all();
        return view('table_c.export.excel', ['data' => $data]);
    }
}
