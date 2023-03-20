<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
        $pets = DB::table('users')
            ->join('pets', 'users.id', '=', 'pets.user_id')
            ->select('users.name as owner', 'pets.name as pet')
            ->get()->chunk(5);

        return view('home', ['pets' => $pets]);
    }

}
