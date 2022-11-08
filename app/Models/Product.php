<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'price',
        'have_discount',
        'discounted_price',
        'img',
        'category_id',
        'sales',
        'isfish'
    ];

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
