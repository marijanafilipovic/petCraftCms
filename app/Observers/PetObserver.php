<?php

namespace App\Observers;

use App\Models\Pet;
use http\Env\Request;
use Illuminate\Support\Facades\File;

class PetObserver
{
    /**
     * @param Pet $pet
     * @return void
     */
    public function updating(Pet $pet): void
    {
        if ($pet->isDirty('image') && $pet->image == "0" && $pet->getOriginal('image') !== 0) {
            $pet->image = $pet->getOriginal('image');
        } else {
            File::delete(public_path('images/' . $pet->getOriginal('image')));
        }
    }

    public function deleted(Pet $pet): void
    {
        if (File::exists(public_path('images/' . $pet->getOriginal('image')))) {
            File::delete(public_path('images/' . $pet->getOriginal('image')));
        }
    }
}
