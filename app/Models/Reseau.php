<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reseau extends Model
{
    use HasFactory , SoftDeletes;
    
    public function Marque(){
        return $this->belongsTo(Marque::class);
    }   
    public function Model(){
        return $this->belongsTo(Models::class);
    } 
}
