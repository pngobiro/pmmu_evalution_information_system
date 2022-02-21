@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $unit->name }} - FY {{ $fy->name  }} </h1>
    </div>

   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create New Group') }}
                        <a href="{{ route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id,$unit->id,$fy->id]) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.units.fy.indicator-groups.store',[$unit_rank->id,$unit->id,$fy->id]) }}">
                            @csrf

                        

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="username" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-12">
                                    <input id="description" type="text" 
                                        class="form-control @error('description') is-invalid @enderror" name="description" rows="3"
                                        value="{{ old('description') }}" required autocomplete="description" autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="order"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>

                                <div class="col-md-6">
                                    <input id="order" type="number" 
                                        class="form-control @error('order') is-invalid @enderror" name="order"
                                        value="{{ old('order') }}" required autocomplete="order" autofocus>

                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create New Group') }}
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