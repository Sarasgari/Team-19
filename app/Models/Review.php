<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'review_text', 'rating'];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

