<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableB extends Model
{
    use HasFactory;
    protected $table = 'table_b';
    public $timestamps = false;
    protected $primaryKey = 'kode_toko';
    protected $attributes = [
        'nominal_transaksi' => 0,
    ];
    protected $fillable = [
        'kode_toko',
        'nominal_transaksi',
    ];
}
