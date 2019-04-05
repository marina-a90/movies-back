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

    public static function search($query, $searchInput, $take, $skip) {
        if ($take && $skip) {

            if ($searchInput) {
                return $query->where('title', 'LIKE', '%' . $searchInput . '%')
                    ->take($take)
                    ->skip($skip)
                    ->get();
            }

            return Movie::take($take)->skip($skip)->get();
        }

        else if ($searchInput) {
            return $query->where('title', 'LIKE', '%' . $searchInput . '%')->get();
        }

        return Movie::all();
    }
}