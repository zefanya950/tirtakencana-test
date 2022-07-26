<?php

namespace App\Exports;

use App\Models\TableB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TabelB implements FromView
{
    public function view() : View
    {
        $data = TableB::all();
        return view('table_b.export.excel', ['data' => $data]);
    }
}
