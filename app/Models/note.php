<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_nt';

    protected $fillable = [
        'note','not2','not3','not4','not5','not6','modul1','modul2','modul3','modul4','modul5','modul6','etu'
    ];
}
