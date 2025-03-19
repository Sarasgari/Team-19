<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'price', 'description', 'platforms', 'image']; // Added platforms and image to fillable fields
}
