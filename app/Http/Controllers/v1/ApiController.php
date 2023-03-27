<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Http\Resources\v1\PetResource;

class ApiController extends Controller
{
    /**
     * @return mixed[]
     */
    public function index()
    {
        return Pet::all()->jsonSerialize();
    }

    /**
     * @param Pet $pet
     * @return PetResource
     */
    public function show(Pet $pet) {
        return new PetResource($pet);
    }

}
