<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'total', 'status'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'total' => 'decimal:2',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the items for the order
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    /**
     * Scope a query to only include orders with a specific status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    
    /**
     * Scope a query to only include orders from a specific time period.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $period (today, week, month)
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromPeriod($query, $period)
    {
        if ($period === 'today') {
            return $query->whereDate('created_at', now()->toDateString());
        } elseif ($period === 'week') {
            return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($period === 'month') {
            return $query->whereMonth('created_at', now()->month)
                         ->whereYear('created_at', now()->year);
        }
        
        return $query;
    }
}