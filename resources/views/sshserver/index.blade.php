


@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">SSH Server</h1>

</div>
<!-- show validation errors -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- create a form with username , password and password_confirmation -->
<div class="container">
    <div class="card">
        <div class="card-header">
            
        </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('change_password_ssh') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-12">
                                <input id="user_name" type="text"
                                    class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                    value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- old password -->
                        <div class="form-group row">
                            <label for="old_password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-12">
                                <input id="old_password" type="text" 
                                    class="form-control @error('old_password') is-invalid @enderror" name="old_password" rows="3"
                                    value="{{ old('old_password') }}" required autocomplete="old_password" autofocus>

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <!-- new password field -->

                            <div class="form-group row">
                                <label for="new_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
    
                                <div class="col-md-12">
                                    <input id="new_password" type="text" 
                                        class="form-control @error('new_password') is-invalid @enderror" name="new_password" rows="3"
                                        value="{{ old('new_password') }}" required autocomplete="new_password" autofocus>
    
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- confirm password fields -->

                            <div class="form-group row">
                                <label for="confirm_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-12">
                                    <input id="confirm_password" type="text" 
                                        class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" rows="3"
                                        value="{{ old('confirm_password') }}" required autocomplete="confirm_password" autofocus>
    
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- submit button -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




                        

