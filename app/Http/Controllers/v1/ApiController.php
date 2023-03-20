<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Pet;

class ApiController extends Controller
{
    /**
     * @return mixed[]
     */
    public function index() {
        return Pet::all()->jsonSerialize();
    }

}
