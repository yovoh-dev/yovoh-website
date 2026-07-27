<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplementationPhase extends Model
{
    use HasFactory;

    protected $fillable = ['phase', 'timeline', 'focus', 'items', 'sort_order'];

    protected $casts = [
        'items' => 'array',
    ];
}
