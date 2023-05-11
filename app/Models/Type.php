<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{  protected $table = 'type';
    use HasFactory;
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }       
    
}
