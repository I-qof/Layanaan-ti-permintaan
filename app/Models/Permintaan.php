<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'permintaan';
    protected $guarded = [''];
}
