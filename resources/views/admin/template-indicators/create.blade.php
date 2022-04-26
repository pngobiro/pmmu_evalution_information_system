@extends('layouts.main')

@section('content')

    <!-- Page Heading -->

    <div class="jumbotron">
        <h1 class="display-7">{{ $unit_rank->name }} - FY {{ $fy->name  }} </h1>
        <p class="lead"><span class="badge badge-primary">Group</span>{{ $template_group->name  }}</p>
      </div>


 
                <div class="card">
                    <div class="card-header">
                        {{ __('Create New Template Indicator') }}
                        <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id,$fy->id,$template_group->id]) }}" class="float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.fy.template-groups.template-indicators.store',[$unit_rank->id,$fy->id,$template_group->id]) }}">
                            @csrf

                            
                            <!--- Master Indicator dropdown --->
                            <div class="form-group row">
                                <label for="master_indicator_id" class="col-md-4 col-form-label text-md-right">{{ __('Master Indicator') }}</label>

                                <div class="col-md-6">
                                    <select id="master_indicator_id" class="form-control @error('master_indicator_id') is-invalid @enderror" name="master_indicator_id" required>
                                        <option value="">Select Master Indicator</option>
                                        @foreach($master_indicators as $master_indicator)
                                            <option value="{{ $master_indicator->id }}">{{ substr($master_indicator->name, 0, 50)  }}</option>
                                        @endforeach
                                    </select>

                                    @error('master_indicator_id')
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
                   
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i>{{ __('Create New Template') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
     

  
@endsection