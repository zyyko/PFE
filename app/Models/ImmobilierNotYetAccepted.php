<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmobilierNotYetAccepted extends Model
{
    use HasFactory;
    public $table = "immobiliers_pas_encore_accepté";
    protected $fillable = [
        "ID_IMMOBILIER",
        "ID_UTILISATEUR",
    ];
    
    public $timestamps = false;
    public $primaryKey = "ID_IMMOBILIER";
}
