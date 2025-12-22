<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';  
    protected $primaryKey = 'id';

    protected $fillable = [
        'year',
        'content_km',
        'content_en',
        'content_ch',
        'image',
    ];
}
