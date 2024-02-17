<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservateur extends Model
{
    use HasFactory;
    public $table = 'reservateur';
    public $timestamps = false;
    protected $primaryKey = 'ID_UTILISATEUR';
}
