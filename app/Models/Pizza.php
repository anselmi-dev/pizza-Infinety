<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Pizza extends Model
{
    use HasFactory, HasSlug;

    protected $with = ['igredients'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'image',
        'slug'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
    /**
     * Get all of the ingredients for the Pizza.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class, 'ingredient_pizza', 'pizza_id', 'ingredient_id');
    }
}
