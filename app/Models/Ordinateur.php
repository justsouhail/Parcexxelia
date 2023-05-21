<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinateur extends Model
{
    protected $table = 'ordinateur';

    use HasFactory;
   
  
    public function Model(){
        return $this->belongsTo(Models::class);
    }       
    public function Processeur(){
        return $this->belongsTo(Processeur::class);
    }           
    public function Os(){
        return $this->belongsTo(Os::class);
    }    
    public function Type(){
        return $this->belongsTo(Type::class);
    }        
    public function Role(){
        return $this->belongsTo(Role::class);
    }    
    public function Marque(){
        return $this->belongsTo(Marque::class);
    }        
    public function Post(){
        return $this->belongsTo(Post::class);
    } 
    public function Moniteur(){
        return $this->hasMany(Moniteur::class);
    }

    public function antivirus(){
        return $this->belongsToMany(Antivirus::class , '_antivirus__ordinateur');
    }
    public function logiciel(){
        return $this->belongsToMany(Logiciel::class , 'logiciel__ordinateur');
    }    
    public function employes(){ 
        return $this->belongsToMany(Employes::class , 'Historique') ;
    }
}
