<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return list of pets all for admin and belongs to custommer

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        return view('forms.pet');
    }

    /**
     * @param StorePetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePetRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'old' => 'string',
            'species' => 'string',
            'pet_image' => 'image|mimes:jpg,png, jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        $file_name = time() . '.' . request()->pet_image->getClientOriginalExtension();
        if ($file_name !== '')
            request()->pet_image->move(public_path('images'), $file_name);

        $pet = new Pet;

        $pet->user_id = Auth::id();
        $pet->name = $request->name;
        $pet->species = $request->species;
        $pet->old = $request->old;
        $pet->image = $file_name;

        $pet->save();

        return redirect()->route('home')->with('success', 'Pet Added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //edit existing pets

    }

    /**
     * @param $petID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($petID)
    {
        $pet = DB::table('pets')
            ->find($petID);
        return view('forms.edit', ['pet' => $pet]);
    }

    /**
     * @param UpdatePetRequest $request
     * @param Pet $pet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        if ($request->pet_image) {

            $file_name = time() . '.' . request()->pet_image->getClientOriginalExtension();
            request()->pet_image->move(public_path('images'), $file_name);
            $image_name = $file_name;

        } else {
            $image_name = "0";
        }

        DB::table('pets')
            ->where('id', $request->pet_id)
            ->update([
                'name' => $request->name,
                'old' => $request->old,
                'species' => $request->species,
                'image' => $image_name
            ]);

        return redirect()->route('home')->with('success', 'Pet successfully changed.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $petID)
    {
        DB::table('pets')->where('id', $petID)->delete();

        return redirect()->route('home')->with('success', 'Pet successfully deleted.');

    }
}
