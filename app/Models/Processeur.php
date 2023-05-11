<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processeur extends Model
{  protected $table = 'processeur';
    use HasFactory;
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }
}
