<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPakaiAduan extends Model
{
    use HasFactory;
    protected $table ='barang_pakai_aduan';
    protected $primaryKey = 'id';
    protected $guarded = [''];
}
