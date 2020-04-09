<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'size', 'category_id', 'image', 'price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function getStarRating()
    {
        $count = $this->reviews()->count();
        if(empty($count)){
            return 0;
        }
        $starCountSum=$this->reviews()->sum('rating');
        $average=$starCountSum/ $count;

       return $average;

    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
