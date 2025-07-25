<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id', 'name_shop', 'desc', 'phone', 'address', 'path',
        'discount_text', 'discount_item', 'discount_image',
        'discount2_text', 'discount2_item', 'discount2_image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    use HasFactory;
}
