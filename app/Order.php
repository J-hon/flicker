<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'movie', 'price', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
