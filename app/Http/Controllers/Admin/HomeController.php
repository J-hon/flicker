<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Movie;
use App\User;
use DateTime;

class HomeController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $actionMovies = Movie::where('genre_id', 1)->get();
        $number = count($actionMovies);

        $users = User::all();
        $usersAbove50 = [];

        foreach ($users as $user)
        {
            if ($this->getAge($user->date_of_birth) > 50)
            {
                array_push($usersAbove50, $user);
            }
        }

        $movies = Movie::all();
        $startWithS = [];

        foreach ($movies as $movie)
        {
            if ($this->endFunc($movie->name, 's'))
            {
                array_push($startWithS, $movie);
            }
        }

        return view('admin.home')->with('number', $number)->with('usersAbove50', $usersAbove50)
                                        ->with('startWithS', $startWithS);
    }

    private function getAge($dob)
    {
        $date = DateTime::createFromFormat("Y-m-d", $dob)->format("Y");
        $presentYear = date("Y");

        return $presentYear - $date;
    }

    private function endFunc($str, $lastString)
    {
        $count = strlen($lastString);
        if ($count == 0) {
            return true;
        }

        return (substr($str, -$count) === $lastString);
    }
}
