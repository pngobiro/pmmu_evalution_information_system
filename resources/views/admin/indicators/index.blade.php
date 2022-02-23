@extends('layouts.main')

@section('content')

    <!-- Page Heading -->

    
    <div class="d-flex justify-content-center .mb-15" >
        <div class="row ">
            <h1 class="h3 mb-0 text-gray-800">{{ $unit->name }} {{ $fy->name }}</h1>
        </div>
       
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
                        <form method="GET" action="{{ route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id,$unit->id,$fy->id ]) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator Group">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>

                                <div class="col">
                                    <a href="{{ route('pmmu', [$unit_rank->id,$unit->id , $fy->id]) }}" class="btn btn-success">Preview PMMU </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.units.fy.indicator-groups.create',[$unit_rank->id,$unit->id,$fy->id ]) }}" class="btn btn-primary mb-2">Create New Group </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col"> Indicator Group Name</th>
                            <th scope="col"> Description</th>
                            <th scope="col"> Weight</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Indicators</th>
                
                
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($indicatorgroups  as $group)
                            <tr>
                                <th> <b>{{ $group->order }} </b></th>
                                <th> {{ $group->name }} </th> 
                                <th> <b>{{ substr($group->description,0,10)}} </b></th> 
                                <th> <b> {{ $group->indicators->sum('indicator_weight')}}</b></th> 
                                <th> <a href="{{ route('unit-ranks.units.fy.indicator-groups.edit', [$unit_rank->id ,$unit->id,$fy->id , $group->id]) }}"> Edit</a>   </th>
                                <th> <a href="{{ route('unit-ranks.units.fy.indicator-groups.indicators.index', [$unit_rank->id ,$unit->id,$fy->id,$group->id]) }}", class="btn btn-success" >Indicators <span class="badge bg-secondary">{{ $group->indicators->count() }}</span> </th>
                            </tr>
                            @endforeach
                    </tbody>    

                    <tfoot>
                        <tr>
                            <td class="right" colspan="3">Total Weights:</td>
                            <td class="right">{{$unit->groupindicators->sum('indicator_weight')}}</span></td>
                            {{-- <td class="right">{{ $group->indicators->sum('indicator_weight')}}</span></td> --}}
                        </tr>
                    </tfoot>
                    
                </table>

        </div>
    </div>

  
@endsection
