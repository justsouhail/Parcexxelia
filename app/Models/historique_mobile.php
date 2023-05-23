<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historique_mobile extends Model
{
    protected $table = 'historique_mobile';
    public function mobile()
    {
        return $this->belongsTo(Mobile::class, 'mobile_id');
    }
    public function employes()
    {
        return $this->belongsTo(Employes::class, 'employes_id');
    }
    use HasFactory;
}
