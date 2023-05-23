<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $table = 'mobile';
    public function employes(){ 
        return $this->belongsToMany(Employes::class , 'Historique_mobile') ;
    }
    public function Model(){
        return $this->belongsTo(Models::class);
    } 
    public function Marque(){
        return $this->belongsTo(Marque::class);
    }  
    use HasFactory;
}
