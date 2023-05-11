<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moniteur extends Model
{

    protected $table = 'moniteur';
    public function ordinateur(){
        return $this->belongsTo(Ordinateur::class);
    } 
    use HasFactory;
}
