<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Oder extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table="oders";
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'product_title',
        'qty',
        'price',
        'image',
        'product_id',
        'payment_status',
        'delivery_status',
        
        
    ];
}
