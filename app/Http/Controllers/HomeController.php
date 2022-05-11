<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
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
        $timeline = Timeline::all()->sortByDesc('created_at')->sortByDesc('Status')->values();
        return view('Dashboard.Admin', compact('timeline'));
        // return view('Dashboard.Admin');
    }
}
