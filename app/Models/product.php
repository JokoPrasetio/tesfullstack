<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];
    
    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
    
}
