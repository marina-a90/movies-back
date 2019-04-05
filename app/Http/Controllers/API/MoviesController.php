<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->input('title'))) {
            $searchInput = $request->input('title');
            return Movie::search(Movie::query(), $searchInput)->get();
        }
        else return Movie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Movie::create($request->all());

        Movie::create($request->validate([
            'title' => 'string|unique:movies|required',
            'director' => 'string|required',
            'imageUrl' => 'string|URL',
            'duration' => 'integer|required|min:1|max:500',
            'releaseDate' => 'required|unique:movies,releaseDate',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->validate([
            'title' => 'string|unique:movies|required',
            'director' => 'string|required',
            'imageUrl' => 'string|URL',
            'duration' => 'integer|required|min:1|max:500',
            'releaseDate' => 'required|unique:movies,releaseDate',
        ]));
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Movie::destroy($id);
    }
}
