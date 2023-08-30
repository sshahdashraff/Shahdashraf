<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $primaryKey="id";
     protected $fillable = [
        'name', 'price', 'availability', 'category_id', 'photo'

    ];
    protected $guarded=[];
    function category()
    {
        // hasOne   product_id => category
        return $this->belongsTo(Category::class);
    }

    public $timestamps=false;
}
