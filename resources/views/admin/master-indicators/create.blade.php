@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New {{ $rank_name}} Indicator </h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Indicator') }}
                        <a href="{{ route('unit-ranks.master-indicator.index',$rank_id) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.master-indicator.store',$rank_id) }}">
                            @csrf


                            <div class="form-group row">
                                <label for="master_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Master ID') }}</label>

                                <div class="col-md-12">

                                    <select name="master_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Indicator Category</option>
                                        @foreach ($master_indicators  as $master)
                                            <option value="{{ $master->id }}">{{ $master->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('master_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                     

                     

                    

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Store') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
