@extends('layouts.app')

@section('content')
    <div class="container-md"><h1>ADMIN PANEL</h1></div>
    @if(count($pets) > 0)
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Pet name</th>
                    <th scope="col">Species</th>
                    <th scope="col">Old</th>
                    <th>Image</th>
                    <th>Owner name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Unpublish/Publish</th>
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
                        <td>{{$data->user->name}}</td>
                        <td><a class="btn btn-warning btn-sm" href="{{ route('pets.edit', $data->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('pets.destroy', $data->id) }}" method="post"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="petId" value="{{$data->id}}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
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

