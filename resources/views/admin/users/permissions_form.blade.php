@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Permission for {{ $user->pj_number }} -{{$user->full_name}}</h1>
</div>

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Id</th>
           
                <th scope="col">Permission (Check Appropriate permission)</th>
   
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                
                    <td>
                        <div class="form-check">
                            <form action="update-permissions" method="post">
                                {{ csrf_field() }}
                                <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]" id="role_{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="role_{{ $role->id }}">
                                    {{ $role->name }}
                                </label>

                            
                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                
                                

                            </form>
                         
                        </div>

        

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection