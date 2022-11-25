<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $fillable = [
        'promo_code',
        'discount_amount',
        'status'
    ];
}
