<?php

namespace App\Http\Controllers;

use App\Exports\TabelD;
use App\Imports\ImportTabelD;
use App\Models\TableD;
use Illuminate\Http\Request;
use PDF;
use Excel;
class TableDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TableD::all();
        return view('table_d.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $kode_sales = $request->kode_sales;
            $nama_sales = $request->nama_sales;

            $data = new TableD;
            $data->kode_sales = $kode_sales;
            $data->nama_sales = $nama_sales;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data saved!');
            return redirect()->back()->with('error', 'Failed to save! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function update_nama_sales(Request $request)
    {
        try {
            $kode_sales = $request->kode_sales;
            $nama_sales = $request->nama_sales;

            $data = TableD::find($kode_sales);
            $data->nama_sales = $nama_sales;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data saved!');
            return redirect()->back()->with('error', 'Failed to save! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function delete(Request $request){
        try {
            $kode_sales = $request->id;
            $data = TableD::find($kode_sales);
            $delete = $data->delete();

            if ($delete)
                return redirect()->back()->with('success', 'Data deleted!');
            return redirect()->back()->with('error', 'Failed to delete! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function exportExcel()
    {
        return Excel::download(new TabelD, 'TableD.xlsx');
    }

    public function exportPdf()
    {
        $data = TableD::all();
        $pdf = PDF::loadView('table_d.export.pdf', ['data' => $data]);

        return $pdf->download('TableD.pdf');
    }

    public function importExcel(Request $request)
    {
        // Validator::make($request->all(), [
        //     'file' => 'required|mimes:xlsx',
        // ])->validate();
        Excel::import(new ImportTabelD, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function show(TableD $tableD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function edit(TableD $tableD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableD $tableD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableD $tableD)
    {
        //
    }
}
