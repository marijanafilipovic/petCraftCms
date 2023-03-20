@extends('layouts.app')

@section('content')
    @if(count($pets) > 0)
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
            <tr>
                <a class="btn btn-link" href="{{ route('pet-create') }}">ADD NEW</a>
            </tr>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Pet name</th>
                <th scope="col">Species</th>
                <th scope="col">Old</th>
                <th>Image</th>
                @if(Auth::user()->model == 'admin')
                    <th scope="col">Owner</th>
                @endif
             </tr>
            </thead>
            <tbody>
            @foreach($pets as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->species }}</td>
                    <td>{{ $data->old }}</td>
                    <td>{{--{{ $data->image }}--}}</td>
                    @if(Auth::user()->model == 'admin')
                        <td>{{ $data->owner }}</td>
                    @endif
                    <td><a class="btn btn-warning" href="{{ route('pet-edit', $data->id) }}">EDIT</a></td>
                    @if(Auth::user()->model == 'admin')
                        <td><a class="btn btn-danger" href="{{ route('pet-destroy', $data->id) }}">DELETE</a></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $pets->links() !!}
        @endif
        @if(count($pets) == 0)
            @include('forms.pet')
        @endif
    </div>

@endsection
