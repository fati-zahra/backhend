<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planing extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pl';

    protected $fillable = [
        'salle','name','modul1','modul2','modul3','modul4','modul5','modul6','modul7','modul8','modul9','modul10','modul12','modul12','modul13','modul14','modul15','modul16',
        'salle2','salle3','salle4','salle5','salle6','salle7','salle8','salle9','salle10','salle11','salle12','salle13','salle14','salle15','salle16',
    ];
}
