@extends('layouts.frontend')

@section('content')

<div class="d-flex flex-column bd-highlight mb-3 .p-3">
    <h1 class="h3 mb-0 text-gray-800">{{ $unit->name }}- FY {{ $fy->name  }} </h1>
    <h2 class="h5 mb-0 text-gray-800"> Group : {{  $indicator_group->name }} </h2>
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
                    <form method="GET" action="{{ route('unit-ranks.units.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id,$fy->id,$indicator_group->id]) }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                    placeholder="Search by indicator name ...">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                            <div>
                                <a href="{{ route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id,$unit->id,$fy->id,$indicator_group->id]) }}" class="btn btn-secondary mb-2">All Groups</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{ route('unit-ranks.units.fy.indicator-groups.indicators.create',[$unit_rank->id,$unit->id,$fy->id,$indicator_group->id]) }}" class="btn btn-primary mb-2">Create New Indicator</a>
                </div>
            </div>
        </div>
        <div class="card-body">

                <table   class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th scope="col">Order</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Indicator Type</th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Indicator Weight</th>
                            <th scope="col">Indicator Target</th>
                            <th scope="col">Edit</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators  as $indicator)
                            <tr>
                                <td>{{ $indicator->order  }}</td>
                                <td style="word-wrap: break-word;min-width:500px;max-width: 500px;">{{ $indicator->name  }}</td>
                                <td>{{ $indicator->type->name }}</td>
                                <td>{{ $indicator->measure->name }}</td>
                                <td>{{ $indicator->indicator_weight }}</td>
                                <td>{{ $indicator->indicator_target }}</td>
                                <td>
                                    <a href="{{ route('unit-ranks.units.fy.indicator-groups.indicators.edit', [$unit_rank->id,$unit->id,$fy->id,$indicator_group->id,$indicator->id]) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="right" colspan="4">Total Weights:</td>
                            <td class="right">{{ $indicator_group->indicators->sum('indicator_weight')}}</span></td>
                        </tr>
                    </tfoot>
                </table>

          
            </div>
        
    </div>
</div>





@endsection