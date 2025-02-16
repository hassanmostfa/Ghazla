<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    public function getImageAttribute()
    {
        return asset('assets/images/categories/' . $this->attributes['image']); // Use the public path with the image name
        
    }

    /**
     * Set the image path and store the uploaded file in the public directory.
     *
     * @param  \Illuminate\Http\UploadedFile  $value
     * @return void
     */
    public function setImageAttribute($value)
    {
        if ($value) {
            // Store the image in the 'public/ads' directory
            $imageName = time() . '_' . $value->getClientOriginalName(); // Unique name
            $value->move(public_path('assets/images/categories'), $imageName); // Move to public/ads
            $this->attributes['image'] = $imageName; // Save the path
        }
    }
}
