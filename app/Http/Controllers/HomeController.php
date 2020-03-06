<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        \Stripe\Stripe::setApiKey('sk_test_');
        //return all products
        return view('welcome',[
            'skus' => \Stripe\SKU::all(),
            'plans' => \Stripe\Plan::all()
        ]);
    }
}
