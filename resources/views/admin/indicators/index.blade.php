@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Indicators</h1>
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
                        <form method="GET" action="{{ route('indicators.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator" >
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('fy.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Indicator </th>
                            <th scope="col">IndicatorType</th>
                            <th scope="col">Unit of Meaure</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Target </th>
                            <th scope="col">Achivement</th>
                            <th scope="col">Remarks </th>
  
              
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators as $indicator)
                            <tr>
                                <th scope="row">{{ $indicator->id }}</th>
                                <td>{{ $indicator->name }}</td>
                                <td>{{ $indicator->type->name }}</td>
                                <td>{{ $indicator->indicator_unit_of_measure- }}</td>
                                <td>{{ $indicator->indicator_weight }}</td>
                                <td>{{ $indicator->indicator_target  }}</td>
                                <td>{{ $indicator->indicator_achivement }}</td>
                                <td>{{ $indicator->remarks }}</td>
                             
                             
                        
                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection