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

    protected $appends =['is_favorite'];

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function getIsFavoriteAttribute(){
        if(auth('api:sanctum')->user()){
            $fav = Favorite::where('product_id',$this->id)->first();
            if($fav){
                return 1;
            }else{
                return 0;
            }
        }
    }
}
