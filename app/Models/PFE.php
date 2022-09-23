<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFE extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pfe';

    protected $fillable = [
        'subject','profsr','etu'
    ];
}
