<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sperpat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'sperpat';
    protected $guarded = [''];
}
