<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrators extends Model
{
    
    use HasFactory;
    protected $fillable = [
        "EMAIL",
        "MOT_DE_PASS",
    ];
    public $primaryKey = "id";
    public $timestamps = false;
}
