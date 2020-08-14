<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Rave;

class RaveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Initialize Rave payment process
     * @return void
     */

    public function initialize(Request $request)
    {
        // This initializes payment and redirects to the payment gateway
        Session::put('movie', $request->movie);

        Rave::initialize(route('callback'));
    }

    /**
     * Obtain Rave callback information
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {

        $body = $request->all();
        $data = json_decode($body['resp'])->data->transactionobject;

        if ($data->status == "successful")
        {

            // transaction was successful...
            OrderController::saveOrder(session('movie'), $data->amount);

            return redirect('/');
        }
        else {
            return redirect('/');
        }
    }
}
