<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobilier extends Model
{
    use HasFactory;
    protected $fillable = [
        "TYPE",
        "ville",
        "Description",
        "image",
        "Disponibilité",
        "Prix",
        'ID_UTILISATEUR'
    ];

    public $timestamps = false;

}
