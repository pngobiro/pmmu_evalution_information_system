@extends('layouts.frontend')

@section('content')

<!-- show status message -->
@if(Session::has('status'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('status') }}
</div>
@endif

<!-- password change form , with reveal password -->
<form method="POST" action="{{ route('users.change.password', $user->id)  }}">
  {{ csrf_field() }}
 
  <div class="form-group">
    <label for="password">New Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
    <!--- password error message --->
    @if($errors->has('password'))
    <span class="help-block">
      <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif

  </div>
  <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
    <!--- password_confirmation error message --->
    @if($errors->has('password_confirmation'))
    <span class="help-block">
      <strong>{{ $errors->first('password_confirmation') }}</strong>
    </span>
    @endif
    
  </div>
  <button type="submit" class="btn btn-primary">Change Password</button>
</form>





@endsection