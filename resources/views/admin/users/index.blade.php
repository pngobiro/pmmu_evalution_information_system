@extends('layouts.main')

@section('content')
<!-- show session message -->
@if(Session::has('message'))
<div class="alert alert-info">
    {{ Session::get('message') }}
</div>
@endif

<!-- show validation errors -->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<section class="content-header">
  <h1>
    Users
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
  </ol>
</section>

<!-- Main content with search and add new user-->

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Users</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 600px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>

                <!--- Add new user button  align div to right--->

                <div class="pull-right">
                  <!-- add new user button , open modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        <i class="fa fa-plus"></i> Add New User
                    </button>
                </div>
        

            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>PJ</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Designation </th>
                <th>Is Active</th>
                <th>Edit</th>
                <th>Delete</th>
       
              </tr>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->pj_number }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->designation }}</td>
                <td>
                    {{ $user->is_active == 1 ? 'Active' : 'Not Active' }}
                <td>
                  <!-- edit user button , open modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>   
                <td>
                   
                    @if ($user->is_active == 1)
                    
                        <button onclick="deactivate_user(<?php echo $user->id ?>);" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate">
                            <i class="fa fa-user-times"></i>
                        </button>
                        
                    @else
                        <button onclick="activate_user(<?php echo $user->id ?>);" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Activate">
                            <i class="fa fa-user-times"></i>
                        </button>
                    @endif
                  


                </td>
        
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.col -->
          </div>
          <!-- /.row -->
          </section>
          <!-- /.content -->
  




@endsection
<!-- New User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jane" required>
                        <!--- Validation -->
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" required>
                        <!--- Validation -->
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                        <!--- Validation -->
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation </label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="designation" required>
                        <!--- Validation -->
                        @if ($errors->has('designation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('designation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                        <!--- Validation -->
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
          
                    <div class="form-group">
                        <label for="pj_number">PJ Number</label>
                        <input type="text" class="form-control" id="pj_number" name="pj_number" placeholder="pj number" required>
                        <!--- Validation -->
                        @if ($errors->has('pj_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pj_number') }}</strong>
                            </span>
                        @endif
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>

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
                        <label for="designation">Designation </label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{ $user->designation }}">
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





