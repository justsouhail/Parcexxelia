<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{  protected $table = 'post';
    use HasFactory;
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }    
}
