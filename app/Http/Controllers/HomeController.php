<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $pets = Pet::with('user')->paginate(5);
        return view('home', ['pets' => $pets]);
    }

    /**
     * @return Renderable
     */
    public function adminPanel(): Renderable
    {
        $pets = Pet::with('user')->orderBy('id', 'DESC')->paginate(5);

        return view('admin.panel')->with('pets', $pets);
    }

    /**
     * @return Renderable
     */
    public function userPanel(): Renderable
    {
        $pets = Pet::query()->where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(5);

        return view('customer.panel')->with('pets', $pets);
    }

}
