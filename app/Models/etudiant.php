<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_etu';

    protected $fillable = [
        'fullname', 'email','cne'
    ];
}
