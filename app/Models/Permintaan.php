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

    public function descPermintaan(){
        return $this->hasMany(DescPermintaan::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
