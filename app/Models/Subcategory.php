<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

      // Define the relationship with Product
      public function products()
      {
          return $this->hasMany(Product::class);
      }
}
