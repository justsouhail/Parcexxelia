<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Os extends Model
{  protected $table = 'Os';
    use HasFactory;
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }    
}

