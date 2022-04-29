@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
   

    <div class="d-flex flex-column">
        <h1 class="h3 mb-0 text-gray-800 p-2">{{ $unit_rank->name }} - FY {{ $fy->name  }} </h1>
        <h1 class="h3 mb-0 text-gray-800 p-2"> {{ $indicator_group->name  }}</h1>
      </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Indicator') }}
                        <a href="{{ route('unit-ranks.units.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id,$fy->id,$indicator_group->id]) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.units.fy.indicator-groups.indicators.update',[$unit_rank->id,$unit->id,$fy->id,$indicator_group->id,$indicator->id]) }}">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group row">
                                <label for="order"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Order') }}</label>

                                <div class="col-md-6">
                                    <input id="order" type="number" class="form-control @error('order') is-invalid @enderror"
                                        name="order" value="{{ old('order',$indicator->order) }}" required autocomplete="order">

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

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name',$indicator->name )}}" required autocomplete="name" autofocus>

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
                                        <option selected>Select Indicator Type </option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"{{ $type->id == $indicator->indicator_type_id  ? 'selected' : '' }}>
                                                {{ $type->name }}</option>
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
                                        <option value="{{ $measure->id }}"{{ $measure->id == $indicator->indicator_unit_of_measure_id  ? 'selected' : '' }}>
                                            {{ $measure->name }}</option>
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
                                        name="indicator_weight" value="{{ old('indicator_weight', $indicator->indicator_weight) }}" required autocomplete="indicator_weight">

                                    @error('indicator_weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                   
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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