<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ticket extends Model
{
    use HasFactory , SoftDeletes;
   
  
    public function Model(){
        return $this->belongsTo(Models::class);
    }       
    public function Marque(){
        return $this->belongsTo(Marque::class);
    } 

}
