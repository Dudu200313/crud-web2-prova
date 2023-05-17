<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'modalidade',
        'idade',
        'altura',
        'peso',
        'user_id'
    ];      
}
