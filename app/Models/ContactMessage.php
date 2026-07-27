<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message', 'read_at'];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function isRead(): bool
    {
        return ! is_null($this->read_at);
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }
}
