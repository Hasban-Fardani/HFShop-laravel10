<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function seller(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(ProductCategory::class,"product_category_id");
    }
    public function promo(){
        return $this->belongsTo(ProductPromo::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function details(){
        return $this->hasMany(ProductDetail::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function feedbacks(){
        return $this->hasMany(ProductFeedback::class);
    }
}