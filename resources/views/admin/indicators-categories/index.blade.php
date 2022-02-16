@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $rank_name }} Indicators</h1>
    </div>
    <div class="row">
        <div class="card  mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('unit-ranks.indicator-categories.index',$rank_id) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Jane Doe">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.indicator-categories.create',$rank_id) }}" class="btn btn-primary mb-2">Create Indicator</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Indicator Type </th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Edit </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators as $indicator)
                            <tr>
                                <th scope="row">{{ $indicator->id }}</th>
                                <td>{{ $indicator->name }}</td>
                                <td>{{ $indicator->indicator_type_id  }}</td>
                                <td>{{ $indicator->indicator_unit_of_measure_id }}</td>
                                <td>{{ $indicator->unit_rank_id }}</td>
                                <td>
                                    <a href="{{ route('unit-ranks.indicator-categories.edit',[$rank_id,$indicator->id]) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection