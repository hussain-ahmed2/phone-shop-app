<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'price',
        'stock',
        'description',
        'specs',
        'image'
    ];

    protected $casts = [
        'specs' => 'array', // Auto-cast JSON field to array
    ];
}
