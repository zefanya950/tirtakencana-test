<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableA extends Model
{
    use HasFactory;
    protected $table = 'table_a';
    public $timestamps = false;
    protected $primaryKey = 'kode_baru';
    protected $attribute = [
        'kode_lama' => null,
    ];
    protected $fillable = [
        'kode_baru',
        'kode_lama',
    ];
}
