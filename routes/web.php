<?php

use App\Http\Controllers\TableAController;
use App\Http\Controllers\TableBController;
use App\Http\Controllers\TableCController;
use App\Http\Controllers\TableDController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('/table_a', TableAController::class);
Route::resource('/table_b', TableBController::class);
Route::resource('/table_c', TableCController::class);
Route::resource('/table_d', TableDController::class);
Route::post('/table_a/update_kode_lama', [TableAController::class,'update_kode_lama'])->name('table_a.update_kode_lama');
Route::post('/table_a/delete', [TableAController::class,'delete'])->name('table_a.delete');
Route::get('exportA/excel',[TableAController::class,'exportExcel'])->name('exportA.excel');
Route::get('exportA/pdf',[TableAController::class,'exportPdf'])->name('exportA.pdf');
Route::post('importA/',[TableAController::class,'importExcel'])->name('importA.excel');

Route::post('/table_b/update_nominal_transaksi', [TableBController::class,'update_nominal_transaksi'])->name('table_b.update_nominal_transaksi');
Route::post('/table_b/delete', [TableBController::class,'delete'])->name('table_b.delete');
Route::get('exportB/excel',[TableBController::class,'exportExcel'])->name('exportB.excel');
Route::get('exportB/pdf',[TableBController::class,'exportPdf'])->name('exportB.pdf');
Route::post('importB/',[TableBController::class,'importExcel'])->name('importB.excel');

Route::post('/table_c/update_area_sales', [TableCController::class,'update_area_sales'])->name('table_c.update_area_sales');
Route::post('/table_c/delete', [TableCController::class,'delete'])->name('table_c.delete');
Route::get('exportC/excel',[TableCController::class,'exportExcel'])->name('exportC.excel');
Route::get('exportC/pdf',[TableCController::class,'exportPdf'])->name('exportC.pdf');
Route::post('importC/',[TableCController::class,'importExcel'])->name('importC.excel');

Route::post('/table_d/update_nama_sales', [TableDController::class,'update_nama_sales'])->name('table_d.update_nama_sales');
Route::post('/table_d/delete', [TableDController::class,'delete'])->name('table_d.delete');
Route::get('exportD/excel',[TableDController::class,'exportExcel'])->name('exportD.excel');
Route::get('exportD/pdf',[TableDController::class,'exportPdf'])->name('exportD.pdf');
Route::post('importD/',[TableDController::class,'importExcel'])->name('importD.excel');