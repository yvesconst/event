<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use DB;

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
        $posts = Post::latest()->get();
        $dates = DB::select('select distinct YEAR(start_at) as annee from festivals');
        $dates = collect($dates)->pluck('annee')->toArray();
        return view('adminHome', compact("posts"), ["dates" => $dates]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $posts = Post::latest()->get();
        $dates = DB::select('select distinct YEAR(start_at) as annee from festivals');
        $dates = collect($dates)->pluck('annee')->toArray();
        return view('adminHome', compact("posts"), ["dates" => $dates]);
    }
}
