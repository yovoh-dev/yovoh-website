<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    use HasFactory;

    protected $fillable = ['area', 'amount', 'components', 'sort_order'];

    protected $casts = [
        'amount' => 'integer',
    ];
}
