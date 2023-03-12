<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id', 'title', 'author_id', 'category_id'
    ];

    public function ratings()
    {
        return $this->hasMany(BookRating::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }
}
