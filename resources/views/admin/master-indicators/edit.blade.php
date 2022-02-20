@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Indicator</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Indicator') }}
                        <a href="{{ route('unit-ranks.master-indicator.index', $masterIndicator->unit_rank_id , $masterIndicator->id) }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-ranks.master-indicator.update',  [$masterIndicator->unit_rank_id , $masterIndicator->id]) }}">
                            @csrf
                            @method('PUT')



                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $masterIndicator ->name) }}" required>

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
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('unit-ranks.master-indicator.destroy',  [$masterIndicator->unit_rank_id , $masterIndicator->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Disable {{ $masterIndicator->name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

