<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservateur extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        "NOM_UTILISATEUR",
        "email",
        "password",
    ];
    public $table = 'reservateur';
    public $timestamps = false;
    

}
