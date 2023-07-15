<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'inventaris';
    protected $guarded = [''];
}
