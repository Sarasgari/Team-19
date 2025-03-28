<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'game_id',
        'game_title',
        'quantity',
        'price',
        'subtotal'
    ];

    /**
     * Get the order that owns the order item
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the game that is associated with the order item
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}