<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescPermintaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'desc_permintaaan';
    protected $guarded = [''];
}
