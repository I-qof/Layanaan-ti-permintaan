<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'jenis_barang';
    protected $guarded = [''];
}
