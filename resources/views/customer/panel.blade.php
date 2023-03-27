@extends('layouts.app')

@section('content')
    <div class="container-md"><h1>PERSONAL PANEL</h1></div>
    @isset($pets)
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                <tr>
                    <a class="btn btn-link" href="{{ route('pets.create') }}">ADD NEW</a>
                </tr>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Pet name</th>
                    <th scope="col">Species</th>
                    <th scope="col">Old</th>
                    <th>Image</th>
                    <th scope="col">Owner</th>
                    {{--@if(Auth::user()->model == 'admin')
                        <th scope="col">Owner</th>
                    @endif--}}
                </tr>
                </thead>
                <tbody>
                @foreach($pets as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->species }}</td>
                        <td>{{ $data->old }}</td>
                        <td><img src="{{ asset('images/' . $data->image) }}" width="75"/></td>
                        <td>{{ $data->user->name }}</td>
                        <td>
                            <form action="{{ route('pets.destroy', $data->id) }}"  method="post"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="petId" value="{{$data->id}}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        <td><a class="btn btn-sm btn-warning" href="{{ route('pets.edit', $data->id) }}">EDIT</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $pets->links() !!}
            @endisset
            @if(count($pets) == 0)
                @include('forms.pet')
            @endif
        </div>

        @endsection
