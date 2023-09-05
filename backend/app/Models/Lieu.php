<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'adresse',
        'horaires_collecte',
        // Autres champs fillable si vous en avez
    ];

    public function trashTypes()
{
    return $this->belongsToMany(trashType::class);
}
}
