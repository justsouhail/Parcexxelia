<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Antivirus extends Model
    {  protected $table = 'antivirus';
        use HasFactory;
        public function Ordinateurs(){
            return $this->belongsToMany(Ordinateur::class, '_antivirus__ordinateur');
        }
    }
