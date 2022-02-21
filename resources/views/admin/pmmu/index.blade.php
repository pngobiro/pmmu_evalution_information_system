@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row ">
        <h1 class="h3 mb-0 text-gray-800">{{ $unit->name }}- {{ $fy->name  }} </h1>
    </div>

    <div class="d-flex justify-content-between">

        <div class="row ">
            <h2 class="h5 mb-0 text-gray-800"> Group : {{  $indicator_group->name }} </h2>
        </div>


        <div class="row ">
            <a href="{{ route('unit-ranks.fy.template-groups.index', [$unit_rank->id,$fy->id]) }}" class="btn btn-success">View All Groups</a>
        </div>
    </div>

    <div class="row ">
        <h4 class="h6 mb-0 text-gray-800"> Group Description: {{  $indicator_group->description  }} </h4>
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
                        <form method="GET" action="{{ route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id,$fy->id,$indicator_group->id]) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search Indicator</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.create',[$unit_rank->id,$fy->id,$indicator_group->id]) }}" class="btn btn-primary mb-2">Create New Indicator</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                           
                            <th scope="col">Order</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Indicator Type</th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Indicator Weight</th>
                            <th scope="col">Edit</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators  as $indicator)
                            <tr>
                                
                                <td>{{ $indicator->order  }}</td>
                                <td>{{ $indicator->name  }}</td>
                                <td>{{ $indicator->type->name }}</td>
                                <td>{{ $indicator->measure->name }}</td>
                                <td>{{ $indicator->indicator_weight }}</td>
                           


                                <td>
                                    <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.edit', [$unit_rank->id,$fy->id,$indicator_group->id,$indicator->id]) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary">
            Total Weight<span class="badge bg-secondary">{{ $indicator_group->indicators->sum('indicator_weight')}}</span>
          </button>
    </div>
       
   
@endsection