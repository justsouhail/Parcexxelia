<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{  protected $table = 'role';
    use HasFactory;
    public function ordinateur(){
        return $this->hasMany(Ordinateur::class);
    }
}
