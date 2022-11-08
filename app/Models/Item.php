<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','cleaning_id','quantity','order_id','user_id','uuid'];

    public function product(){
        return $this->hasOne(Product::class);
    }

    public function cleaning(){
        return $this->hasOne(Cleaning::class);
    }
}
