<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total']; // Add other necessary fields

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
