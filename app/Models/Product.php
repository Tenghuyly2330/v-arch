<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name_en',
        'name_km',
        'name_ch',
        'slug',
        'color',
        'content_en',
        'content_km',
        'content_ch',
        'status',
        'best_pick',
        'category_id',
    ];

    protected $casts = [
        'color' => 'array',
        'status' => 'boolean',
        'best_pick' => 'boolean',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->id = $product->id ?? (method_exists(Str::class, 'cuid') ? Str::cuid() : Str::random(10));
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
