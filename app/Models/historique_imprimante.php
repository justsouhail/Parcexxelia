<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historique_imprimante extends Model
{
    protected $table =  'historique_imprimante';
    
    public function imprimante()
    {
        return $this->belongsTo(Ordinateur::class, 'imprimante_id');
    }
    public function employes()
    {
        return $this->belongsTo(Employes::class, 'employes_id');
    }

    use HasFactory;
}
