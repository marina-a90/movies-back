<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 
        'director',
        'imageUrl',
        'duration',
        'releaseDate',
        'genre'
    ];

    const genres = [
        'comedy', 
        'thriller', 
        'action', 
        'drama', 
        'documentary'
    ];

    public static function search($query, $searchInput) {
        if ( isset($searchInput) ) {
            return $query->where('title', 'LIKE', '%' . $searchInput . '%');
        }
    }
}
