<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannedUsers extends Model
{
    use HasFactory;
    public $table = "utilisateurs_exclus";
    public $primaryKey = "ID_UTILISATEUR";
}
