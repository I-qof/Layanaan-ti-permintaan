<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescPembelian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'desc_pembelian';
    protected $guarded = [''];

}
