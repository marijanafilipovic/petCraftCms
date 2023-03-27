@extends('layouts.app')
@section('content')
    <div class="container-md">
        <form action="{{ url('pets') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}" />
            <div class="row mb-4">
                <label for="name">Pet Name</label>
                <input name="name" type="name" class="form-control" id="petName" aria-describedby="yourPetName"
                       placeholder="Enter name">
            </div>
            <div class="row mb-4">
                <label for="old">How old is he?</label>
                <input type="text" id="old" placeholder="years" name="old">
            </div>
            <div class="row mb-4">
                <label for="spices">Which of spices?</label>
                <input type="text" id="spices" placeholder="species" name="species">
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Pet's Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image"/>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary btn-lg" value="Add"/>
            </div>
        </form>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endsection
