<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'icon', 'color', 'short', 'goal', 'activities', 'outputs', 'sort_order',
    ];

    protected $casts = [
        'activities' => 'array',
        'outputs' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (Pillar $pillar) {
            if (empty($pillar->slug)) {
                $pillar->slug = Str::slug($pillar->title);
            }
        });
    }
}
