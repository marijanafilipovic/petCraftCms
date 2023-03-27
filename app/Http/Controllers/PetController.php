<?php

namespace App\Http\Controllers;

use App\Http\Resources\v1\PetResource;
use App\Models\Pet;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use phpDocumentor\Reflection\Types\Collection;

class PetController extends Controller
{
    /**
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return PetResource::collection(Pet::all()->chunk(5));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('forms.pet');
    }

    /**
     * @param StorePetRequest $request
     * @return RedirectResponse
     */
    public function store(StorePetRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            $image_name = uniqid() . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('images'), $image_name);
            $data['image'] = $image_name;
        } else {
            $data['image'] = "0";
        }

        Pet::create($data);

        return redirect()->route('customer-panel')->with('success', 'Pet Added successfully.');

    }

    /**
     * @param Pet $pet
     * @return void
     */
    public function show(Pet $pet): void
    {
        //edit existing pets

    }

    /**
     * @param $petID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Pet $pet)
    {
        return view('forms.edit', compact('pet'));
    }

    /**
     * @param UpdatePetRequest $request
     * @param Pet $pet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $data = $request->validated();

        if ($request->image !== '0') {
            $image_name = uniqid() . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('images'), $image_name);
            $data['image'] = $image_name;
        } else {
            $data['image'] = 0;
        }

        $pet->update($data);

        return redirect()->route('customer-panel')->with('success', 'Pet successfully changed.');

    }

    /**
     * @param Request $request
     * @param Pet $pet
     * @return RedirectResponse
     */
    public function destroy(Request $request, Pet $pet): RedirectResponse
    {
        $pet->destroy($request->petId);

        return redirect()->route('customer-panel')->with('success', 'Pet successfully deleted.');
    }
}
