<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRating extends Model
{
    protected $fillable = [
        'rating', 'book_id'
    ];
}
