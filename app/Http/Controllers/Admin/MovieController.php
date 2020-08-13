<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movie.show')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movie.create')->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'name' => 'required|max:255',
            'genre_id' => 'required|integer',
            'description' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required'
        ]);

        $movie = new Movie();

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/movies/'.$filename);
            Image::make($image)->resize(220, 325)->save($location);

            $movie->image = $filename;
        }

        $movie->name = $request->name;
        $movie->genre_id = $request->genre_id;
        $movie->description = $request->description;
        $movie->price = $request->price;

        $movie->save();

        return redirect()->route('admin.movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
        return view('movie.edit')->with('movie', $movie)->with('genres', $genres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        // validate the data
        $this->validate($request, [
            'name' => 'string|max:255',
            'genre_id' => 'integer',
            'description' => 'string',
            'image' => 'image|max:2048',
            'price' => 'required'
        ]);

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/movies/'.$filename);
            Image::make($image)->resize(220, 325)->save($location);
            $oldFileName = $movie->image;

            // delete old image
            Storage::delete($oldFileName);

            $movie->image = $filename;
        }

        $movie->name = $request->name;
        $movie->genre_id = $request->genre_id;
        $movie->description = $request->description;
        $movie->price = $request->price;

        $movie->save();

        return redirect()->route('admin.movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('admin.movies.index');
    }
}
