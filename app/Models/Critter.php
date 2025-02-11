<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critter extends Model
{
    use HasFactory;

    protected $table = 'critters';
}
