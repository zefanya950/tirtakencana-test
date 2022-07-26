<?php

namespace App\Http\Controllers;

use App\Exports\TabelC;
use App\Imports\ImportTabelC;
use App\Models\TableC;
use Illuminate\Http\Request;
use PDF;
use Excel;
class TableCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TableC::all();
        return view('table_c.index', compact('data'));
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
            $kode_toko = $request->kode_toko;
            $area_sales = $request->area_sales;

            $data = new TableC;
            $data->kode_toko = $kode_toko;
            $data->area_sales = $area_sales;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data saved!');
            return redirect()->back()->with('error', 'Failed to save! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function update_area_sales(Request $request)
    {
        try {
            $kode_toko = $request->kode_toko;
            $area_sales = $request->area_sales;

            $data = TableC::find($kode_toko);
            $data->area_sales = $area_sales;
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
            $kode_toko = $request->id;
            $data = TableC::find($kode_toko);
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
        return Excel::download(new TabelC, 'TableC.xlsx');
    }

    public function exportPdf()
    {
        $data = TableC::all();
        $pdf = PDF::loadView('table_c.export.pdf', ['data' => $data]);

        return $pdf->download('TableC.pdf');
    }

    public function importExcel(Request $request)
    {
        // Validator::make($request->all(), [
        //     'file' => 'required|mimes:xlsx',
        // ])->validate();
        Excel::import(new ImportTabelC, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function show(TableC $tableC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function edit(TableC $tableC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableC $tableC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableC $tableC)
    {
        //
    }
}
