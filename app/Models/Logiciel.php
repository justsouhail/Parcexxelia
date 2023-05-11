<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logiciel extends Model
{  protected $table = 'logiciel';
    public function Ordinateurs(){
        return $this->belongsToMany(Ordinateur::class, 'logiciel__ordinateur');
    }
    use HasFactory;
}
