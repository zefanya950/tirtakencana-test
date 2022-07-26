<?php

namespace App\Http\Controllers;

use App\Exports\ExportTabelA;
use App\Exports\TabelA;
use App\Imports\ImportTabelA;
use App\Models\TableA;
use Illuminate\Http\Request;
use Validator;
use PDF;
use Excel;
class TableAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TableA::all();
        return view('table_a.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
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
            $kode_baru = $request->kode_baru;
            $kode_lama = $request->kode_lama;

            $data = new TableA;
            $data->kode_baru = $kode_baru;
            $data->kode_lama = $kode_lama;
            $save = $data->save();

            if ($save)
                return redirect()->back()->with('success', 'Data saved!');
            return redirect()->back()->with('error', 'Failed to save! Please try again later.');
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function show(TableA $tableA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function edit(TableA $tableA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    public function update_kode_lama(Request $request)
    {
        try {
            $kode_baru = $request->kode_baru;
            $kode_lama = $request->kode_lama;
            // Validator::make($request->all(), [
            //     'kode_baru' => !is_null($kode_baru) ? 'numeric' : '',
            //     'kode_lama' => !is_null($kode_lama) ? 'numeric|unique:table_a,kode_lama' : '',
            // ])->validate();

            $data = TableA::find($kode_baru);
            $data->kode_lama = $kode_lama;
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
            $kode_baru = $request->id;
            $data = TableA::find($kode_baru);
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
        return Excel::download(new TabelA, 'TableA.xlsx');
    }

    public function exportPdf()
    {
        $data = TableA::all();
        $pdf = PDF::loadView('table_a.export.pdf', ['data' => $data]);

        return $pdf->download('TableA.pdf');
    }

    public function importExcel(Request $request)
    {
        // Validator::make($request->all(), [
        //     'file' => 'required|mimes:xlsx',
        // ])->validate();
        Excel::import(new ImportTabelA, $request->file('file'));

        return redirect()->back()->with('success', 'Data import succeed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableA $tableA)
    {
        //
    }
}
