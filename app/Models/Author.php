<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'last_name',
        'year_of_birth',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

}
