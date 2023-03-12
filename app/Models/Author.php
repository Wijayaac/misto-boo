<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id', 'name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
