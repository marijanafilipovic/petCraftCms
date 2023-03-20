@extends('layouts.app')
@section('content')
    <div class="container-md">
        <form action="{{ route('pet-put', $pet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pet_id" value="{{ $pet->id }}">
            <input type="hidden" name="owner_id" value="{{ $pet->user_id }}">
            <div class="row mb-4">
                <label for="name">Pet Name</label>
                <input type="name" name="name" class="form-control" id="petName" aria-describedby="yourPetName" placeholder="Enter name" value="{{ $pet->name !== '' ? $pet->name : 'Enter name' }}">
            </div>
            <div class="row mb-4">
                <label for="old">How old is your pet?</label>
                <input type="text" name="old" id="old" placeholder="years" value="{{ $pet->old !== '' ? $pet->old : 'Enter age' }}">
            </div>
            <div class="row mb-4">
                <label>What kind is your pet?</label>
                <input type="text"  name="species"value="{{ $pet->species !== '' ? $pet->species : 'Enter species' }}">
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Pet's Image</label>
                <div class="col-sm-10">
                    <input type="file" name="pet_image" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
@endsection
