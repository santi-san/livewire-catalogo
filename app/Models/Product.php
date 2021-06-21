<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','price','stock','description','image','category_id','brand_id'];

    public function relBrand() 
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function relCategory() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
