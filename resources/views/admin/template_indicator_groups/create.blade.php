@extends('layouts.main')

@section('content')

    <!-- create a jumbroton -->

    <div class="card">

        <div class="jumbotron">
            <h1 class="display-7">{{ $unit_rank->name }} - FY {{ $fy->name  }} </h1>
            <p class="lead"><span class="badge badge-primary">Category</span>{{$rank_category->name  }} </p>
        </div>


   
  
                    <div class="card-header">
                        {{ __('Create New Group') }}
                        <a href="{{ route('unit-ranks.fy.rank_category.template-groups.index',[$unit_rank->id,$fy->id, $rank_category]) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category]) }}">
                            @csrf

                        

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Group Description') }}</label>

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
 
@endsection