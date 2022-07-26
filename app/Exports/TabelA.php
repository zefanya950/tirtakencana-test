<?php

namespace App\Exports;

use App\Models\TableA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TabelA implements FromView
{
    public function view() : View
    {
        $data = TableA::all();
        return view('table_a.export.excel', ['data' => $data]);
    }
}
