<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::all();
        return view('welcome')->with('movies', $movies);
    }

    /**
     * Show the application user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userIndex()
    {
        $user = Auth::user();
        return view('home')->with('user', $user);
    }
}
