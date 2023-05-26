<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imprimante extends Model
{
    protected $table = 'imprimante';

    public function Marque(){
        return $this->belongsTo(Marque::class);
    } 

    public function Model(){
        return $this->belongsTo(Models::class);
    }
    public function employes(){ 
        return $this->belongsToMany(Employes::class , 'historique_imprimante') ;
    } 
    use HasFactory ,SoftDeletes;
}
