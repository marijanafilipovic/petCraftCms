<?php

namespace App\Http\Controllers;

use App\Http\Resources\v1\PetResource;
use App\Models\Pet;
use App\Models\User;
use http\Client\Response;
use Illuminate\Contracts\Database\Eloquent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() : Renderable
    {
        $pets = Pet::with('user')->paginate(5);
        //$pets = Pet::all()->chunk(5);
        return view('home', ['pets' => $pets]);
    }

    /**
     * @return Renderable
     */
    public function adminPanel() : Renderable
    {
        $pets = Pet::with('user')->paginate(5);

        return view('admin.panel')->with('pets', $pets);
    }

    /**
     * @return Renderable
     */
    public function userPanel() : Renderable
    {
        $pets = Pet::query()->where('user_id', Auth::id())->with('user')->paginate(5);

        return view('customer.panel')->with('pets', $pets);
    }

}
