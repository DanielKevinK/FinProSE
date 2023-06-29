<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'investor_id',
        'ivnest_quantity',
        'commission',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function investors()
    {
        return $this->belongsTo(User::class, 'investor_id', 'id');
    }
}
