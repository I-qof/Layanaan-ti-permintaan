<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPakaiPermintaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'barang_pakai_permintaan';
    protected $guarded = [''];
}
