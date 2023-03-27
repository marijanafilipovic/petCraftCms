@extends('layouts.app')
@section('content')
    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>

    @endif
    <div class="container-md">
        <form action="{{ route('pets.update', $pet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="pet_id" value="{{ $pet->id }}">
            <input type="hidden" name="user_id" value="{{ $pet->user_id }}">
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
                    <input type="file" name="image" />
                    <img src="{{ asset('images/' . $pet->image) }}" width="175" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
@endsection
