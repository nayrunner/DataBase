<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'updated_at',
        'created_at',
        'status',
        'require_date',
        'shipped_date',
        'comment',
        'price',
        'promotioncode',
        'product_id',
    ];
}
