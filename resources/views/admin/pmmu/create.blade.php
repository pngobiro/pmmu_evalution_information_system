@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
   
      
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $unit_rank->name }} - FY {{ $fy->name  }} </h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> {{ $indicator_group->name  }}</h1>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create New Indicator') }}
                        <a href="{{ route('unit-ranks.units.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id,$fy->id ,$indicator_group->id]) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.units.fy.indicator-groups.indicators.store',[$unit_rank->id,$unit->id,$fy->id,$indicator_group->id]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="order"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Order') }}</label>

                                <div class="col-md-6">
                                    <input id="order" type="number" class="form-control @error('order') is-invalid @enderror"
                                        name="order" value="{{ old('order') }}" required autocomplete="order">

                                    @error('order')
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
                                <label for="indicator_type_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Type') }}</label>

                                <div class="col-md-6">
                                    <select name="indicator_type_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('indicator_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                           <div class="form-group row">
                                <label for="indicator_unit_of_measure_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Unit of Measure') }}</label>

                                <div class="col-md-6">
                                    <select name="indicator_unit_of_measure_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Unit of Measure</option>
                                        @foreach ($measures as $measure)
                                            <option value="{{ $measure->id }}">{{ $measure->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('indicator_unit_of_measure_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="indicator_weight"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Weight') }}</label>

                                <div class="col-md-6">
                                    <input id="indicator_weight" type="number" class="form-control @error('indicator_weight') is-invalid @enderror"
                                        name="indicator_weight" value="{{ old('indicator_weight') }}" required autocomplete="indicator_weight">

                                    @error('indicator_weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="indicator_target"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Target') }}</label>

                                <div class="col-md-6">
                                    <input id="indicator_target" type="number" class="form-control @error('indicator_target') is-invalid @enderror"
                                        name="indicator_target" value="{{ old('indicator_target') }}" required autocomplete="indicator_target">

                                    @error('indicator_target')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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