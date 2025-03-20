<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'game_id',
        'game_name',
        'price',
        'quantity'
    ];
    
    /**
     * Get the order that this item belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    /**
     * Get the game associated with this order item.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}