@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Pet name</th>
                <th scope="col">Species</th>
                <th scope="col">Old</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $data)
                <tr>
                    <th scope="row">{{ $data['id'] }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->species }}</td>
                    <td>{{ $data->old }}</td>
                    <td><img src="{{ asset('images/' . $data->image) }}" width="75" /></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
{{--    {!! $pets->links() !!}--}}
@endsection
