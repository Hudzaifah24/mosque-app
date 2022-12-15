<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    use HasFactory;

    protected $table = 'kajians';

    protected $fillable = [
        'title',
        'speaker',
        'status',
        'jam',
        'desc',
        'tanggal'
    ];
}
