<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;
    protected $table = 'employes';
    protected $connection = 'mysql';

    protected $fillable = [
        'Nom',
        'Prenom',
        'CIN',
        'service_id',
    ];

    public function Service(){
        return $this->belongsTo(Service::class);
    }
}
