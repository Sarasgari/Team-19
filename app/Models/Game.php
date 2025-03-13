<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'releasedate', 'stock', 'platform'];

    // Enable timestamps (if your table has created_at and updated_at)
    public $timestamps = true;
}
