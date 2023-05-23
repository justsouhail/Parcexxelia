<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $table = 'historique';

    public function ordinateur()
    {
        return $this->belongsTo(Ordinateur::class, 'ordinateur_id');
    }
    public function employes()
    {
        return $this->belongsTo(Employes::class, 'employes_id');
    }

    use HasFactory;
}
