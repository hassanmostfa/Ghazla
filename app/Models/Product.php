<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'subcategory_id', // Add this
    ];

    // Define the relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

}
