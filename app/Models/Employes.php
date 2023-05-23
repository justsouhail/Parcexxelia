<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;
    protected $table = 'employes';
    protected $connection = 'mysql';

    protected $fillable = [
        'Nom',
        'Prenom',
        'CIN',
        'service_id',
    ];

    public function Service(){
        return $this->belongsTo(Service::class);
    }
    public function Ordinateurs(){
        return $this->belongsToMany(Ordinateur::class, 'Historique');
    }
    public function Imprimante(){
        return $this->belongsToMany(Imprimante::class, 'historique_imprimante');
    }
    public function Mobile(){ 
        return $this->belongsToMany(Mobile::class , 'Historique_mobile') ;
    }
  
}
