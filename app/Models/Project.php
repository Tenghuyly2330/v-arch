<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'id';
    protected $fillable = [
        'title_en',
        'title_km',
        'title_ch',
        'content_km',
        'content_en',
        'content_ch',
        'slug',
        'image',
    ];
    protected $casts = [
        'image' => 'array'
    ];
}
