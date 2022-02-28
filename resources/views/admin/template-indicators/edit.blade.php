@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $rank_name }} - FY {{ $fy_name  }} </h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> {{ $group_name  }}</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Template Indicator') }}
                        <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.index',[$rank_id,$fy_id,$group_id]) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.fy.template-groups.template-indicators.update',[$rank_id,$fy_id,$group_id,$template_indicator->id]) }}">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group row">
                                <label for="master_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Master ID') }}</label>

                                <div class="col-md-12">

                                    <select name="master_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Indicator Category</option>
                                        @foreach ($master_indicators  as $master)
                                            <option value="{{ $master->id }}" {{ $master->id == $template_indicator->master_id  ? 'selected' : '' }}>{{ $master->name }}</option>
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

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name',$template_indicator->name )}}" required autocomplete="name" autofocus>

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
                                            <option value="{{ $type->id }}"{{ $type->id == $template_indicator->indicator_type_id  ? 'selected' : '' }}>
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
                                        <option value="{{ $measure->id }}"{{ $measure->id == $template_indicator->indicator_unit_of_measure_id  ? 'selected' : '' }}>
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
                                        name="indicator_weight" value="{{ old('indicator_weight', $template_indicator->indicator_weight) }}" required autocomplete="indicator_weight">

                                    @error('indicator_weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indicator Order') }}</label>

                                <div class="col-md-6">
                                    <input id="order" type="number" class="form-control @error('order') is-invalid @enderror"
                                        name="order" value="{{ old('order',$template_indicator->order) }}" required autocomplete="order">

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