<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableD extends Model
{
    use HasFactory;
    protected $table = 'table_d';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $primaryKey = 'kode_sales';
    protected $fillable = [
        'kode_sales',
        'nama_sales',
    ];
}
