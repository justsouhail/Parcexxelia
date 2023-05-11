<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{  protected $table = 'marque';
    use HasFactory;
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }
}
