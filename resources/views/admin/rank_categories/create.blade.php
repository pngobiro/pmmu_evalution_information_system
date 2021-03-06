@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-center .mb-15" >
    <div class="row ">
        <h1 class="h3 mb-0 text-gray-800">{{ $unit_rank->name }} - {{ $fy->name }}</h1>
    </div>
   
</div>


<div class="card-body">
    <form method="POST" action="{{ route('unit-ranks.fy.rank_category.store',[$unit_rank->id,$fy->id]) }}">
        @csrf

        <div class="form-group row">
            <label for="name"
                class="col-md-4 col-form-label text-md-right">{{ __('Rank Category Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text"
                    class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

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

            <div class="col-md-6">
                <input id="description" type="text"
                    class="form-control @error('description') is-invalid @enderror" name="description"
                    value="{{ old('description') }}" required autocomplete="description" autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Create New Category') }}
                </button>
            </div>
        </div>
    </form>
</div>


@endsection