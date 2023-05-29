<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique_fixe extends Model
{
    public function fixe()
    {
        return $this->belongsTo(Tel_fixe::class, 'tel_fixe_id');
    }
    public function employes()
    {
        return $this->belongsTo(Employes::class, 'employes_id');
    }
    use HasFactory;
}
