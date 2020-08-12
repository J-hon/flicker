<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name', 'description', 'genre_id', 'price'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
