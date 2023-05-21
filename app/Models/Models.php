<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'model';
    use HasFactory; 
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }
    public function categorie(){
        return $this->hasMany(Categorie::class);
    }
    
}
