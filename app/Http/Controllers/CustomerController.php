<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function panel()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->get()->first();
        if ($user->model == 'admin') {
            $pets = DB::table('users')
                ->join('pets', 'users.id', '=', 'pets.user_id')
                ->select('users.name as owner',
                    'pets.name as name',
                    'pets.id as id',
                    'pets.species as species',
                    'pets.old as old',
                    'pets.image as image',
                )
                ->paginate(5);
        } else {
            $pets = DB::table('users')
                ->join('pets', 'users.id', '=', 'pets.user_id')
                ->select('users.name as owner',
                    'pets.name as name',
                    'pets.id as id',
                    'pets.species as species',
                    'pets.old as old',
                    'pets.image as image',
                )
                ->where('pets.user_id', Auth::id())
                ->paginate(5);
        }

        return view('customer.panel', ['pets' => $pets]);
    }
}
