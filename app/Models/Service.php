<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $connection = 'mysql';

    protected $fillable = [
        'Nom',
    ];

    public function SevicesEmployes(){
        return $this->hasMany(Employes::class);
    }
    public function SevicesOrdinateur(){
        return $this->hasMany(Ordinateur::class);
    }
}
