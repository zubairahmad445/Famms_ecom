<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $table="products";
    protected $fillable=[
        'title',
        'des',
        'image',
        'category',
        'price',
        'dis_price',
        'qty',
        
    ];
     public function pr()
    {
       return $this->belongsTo(category::class, 'category', 'id');
    }
}
