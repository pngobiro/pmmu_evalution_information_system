@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
    <div class="row">
        <div class="card  mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('users.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Jane Doe">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                  
                    <div>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createUserModal">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>

                            Create New User                
                        </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">PJ</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">State</th>
                            <th scope="col">Email</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Role</th>
                            <th scope="col">DeActivate User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->pj_number }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                
                                <td>
                                  {{ $user->is_active ? 'Active' : 'Inactive' }}
                    
                                </td>   
                                <td>{{ $user->email }}</td>
                           
                            
                                <!-- Edit Button  pass user ID-->

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                <td>


                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userPermissionsModal{{ $user->id }}">
                                        <i class="fas fa-user-lock" aria-hidden="true"></i>
                                    </button>
                        
                           
                                <td>
                                    <button onclick="deactivate_user(<?php echo $user->id ?>);" class="btn btn-danger btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Deactivate">
                                         <i class="fa fa-user-times"></i>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- New User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jane">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                    </div>
          
                    <div class="form-group">
                        <label for="pj_number">PJ Number</label>
                        <input type="text" class="form-control" id="pj_number" name="pj_number" placeholder="pj number">
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach ($users as $user) 
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="pj_number">PJ Number</label>
                        <input type="text" class="form-control" id="pj_number" name="pj_number" value="{{ $user->pj_number }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach




<!--userPermissions modal-->
@foreach ($users as $user) 
    
<div class="modal fade" id="userPermissionsModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Permissions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <select class="form-control" id="permissions" name="permissions">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach







<script>


function deactivate_user(id) {
    var url = "{{ route('users.deactivate', ':id') }}";
        if (window.confirm('Are you sure you want to deactivate this User?')) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        }
    }
    function activate_user(id) {
    var url = "{{ route('users.activate', ':id') }}";

        if (window.confirm('Are you sure you want to activate this User?')) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        }
    }
</script>





