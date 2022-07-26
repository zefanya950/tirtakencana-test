<?php

namespace App\Http\Controllers;

use App\Exports\TabelB;
use App\Imports\ImportTabelB;
use App\Models\TableB;
use Illuminate\Http\Request;
use PDF;
use Excel;
class TableBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TableB::all();
        return view('table_b.index', compact('data'));
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
            $nominal_transaksi = $request->nominal_transaksi;

            $data = new TableB;
            $data->kode_toko = $kode_toko;
            $data->nominal_transaksi = $nominal_transaksi;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data saved!');
            return redirect()->back()->with('error', 'Failed to save! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function update_nominal_transaksi(Request $request)
    {
        try {
            $kode_toko = $request->kode_toko;
            $nominal_transaksi = $request->nominal_transaksi;

            $data = TableB::find($kode_toko);
            $data->nominal_transaksi = $nominal_transaksi;
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
            $data = TableB::find($kode_toko);
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
        return Excel::download(new TabelB, 'TableB.xlsx');
    }

    public function exportPdf()
    {
        $data = TableB::all();
        $pdf = PDF::loadView('table_b.export.pdf', ['data' => $data]);

        return $pdf->download('TableB.pdf');
    }

    public function importExcel(Request $request)
    {
        // Validator::make($request->all(), [
        //     'file' => 'required|mimes:xlsx',
        // ])->validate();
        Excel::import(new ImportTabelB, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function show(TableB $tableB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function edit(TableB $tableB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableB $tableB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableB $tableB)
    {
        //
    }
}
