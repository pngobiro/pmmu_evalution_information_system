@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Permission for {{ $user->jsg_number }} -{{$user->full_name}}</h1>
</div>

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Permission (Check Appropriate permission)</th>
   
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>

                    <td> {{ Form::checkbox($role->name, 'value') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection