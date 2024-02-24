<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generate extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $primarykey = 'id';
}
