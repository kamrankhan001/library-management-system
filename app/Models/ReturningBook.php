<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturningBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'issue_date',
        'returning_date',
        'status',
    ];
}
