<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $fillable = [
        'media',
        'name',
        'image',
    ];

    protected $casts = [
        'media' => 'array',
    ];
}
