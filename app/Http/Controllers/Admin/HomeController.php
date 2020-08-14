<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Movie;
use App\Order;
use App\User;
use Carbon\Carbon;
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
        return view('admin.home');
    }

    public function report()
    {
        $actionMovies = Movie::where('genre_id', 1)->get();

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

        $orders = Order::all();
        $totalOrders = count($orders);

        $monthlyOrders = $this->monthlyOrders();

        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $timestamp = mktime(0, 0, 0, date('n') + $i, 1);
            $months[date('n', $timestamp)] = date('F', $timestamp);
        }

        return view('admin.report')->with('actionMovies', $actionMovies)
            ->with('usersAbove50', $usersAbove50)
            ->with('startWithS', $startWithS)
            ->with('monthlyOrders', $monthlyOrders)
            ->with('months', $months)
            ->with('totalOrders', $totalOrders);
    }

    private function monthlyOrders()
    {
        $users = Order::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }

        return $userArr;
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
