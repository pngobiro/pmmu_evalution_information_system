@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <table class="table table-striped">
                    <thead >
                        <tr>
                            <th scope="col">Unit Type</th>
                            <th> Unit</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                    <th> {{ $unit_rank->name }}</th>
                    <th> {{ $unit->name }} </th>
                   
                </tr>    
            </tbody>
            </table>
  

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
                        <form method="GET" action="{{ route('fy.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="e.g 2018/2019">
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
                            <th scope="col">Period</th>
                            <th scope="col">View</th>
                            <th scope="col">View</th>
              
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fys as $fy)
                            <tr>
                                <th scope="row">{{ $fy->id }}</th>
                                <td>{{ $fy->name }}</td>
                                <td><a href="{{ route('unit-ranks.units.fy.indicator-groups.index', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-success">Indicator Groups</a></td>
                                <td><a href="{{ route('pmmu', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-success">PMMU</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
