<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moniteur extends Model
{

    protected $table = 'moniteur';
    public function ordinateur(){
        return $this->belongsTo(Ordinateur::class);
    } 

    public function Marque(){
        return $this->belongsTo(Marque::class);
    }   
    public function Model(){
        return $this->belongsTo(Models::class);
    } 
    

    use HasFactory ,SoftDeletes;
}
