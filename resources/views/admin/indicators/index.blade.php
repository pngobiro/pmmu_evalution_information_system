@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    
    <div class="card  ">
        <div class="jumbotron">
            <h1 class="display-8">{{ $unit->name }}</h1>
            <p class="lead">FY {{ $fy->name }}</p>
        </div>
  

   
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
                            <div class="form-row align-items-center">

                                <div class="col">
                                    <a href="{{ route('pmmu', [$unit_rank->id,$unit->id , $fy->id]) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Preview PMMU </a>
                                </div>

                                <div class="col">
                                    <a href="{{ route('update_targets', [$unit_rank->id,$unit->id , $fy->id]) }}" class="btn btn-warning"> <i class="fa fa-refresh" aria-hidden="true"></i> Update Targets </a>
                                </div>

                                <div class="col">
                                    <a href="{{ route('unit-ranks.units.fy.indicator-groups.create',[$unit_rank->id,$unit->id,$fy->id ]) }}" class="btn btn-primary mb-2"><i class="fa fa-plus" aria-hidden="true"></i>Create New Group </a>
                                </div>

                            </div>
                    </div>
                
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col"> Indicator Group Name</th>
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
                                <th> <span class="badge badge-primary">{{ $group->total_indicators}}</span> </th> 
                                <th> <a href="{{ route('unit-ranks.units.fy.indicator-groups.edit', [$unit_rank->id ,$unit->id,$fy->id , $group->id]) }}"> <i class="fas fa-edit"></i> Edit</a>   </th>
                                <th> <a href="{{ route('unit-ranks.units.fy.indicator-groups.indicators.index', [$unit_rank->id ,$unit->id,$fy->id,$group->id]) }}", class="btn btn-success" >Indicators <span class="badge bg-secondary">{{ $group->indicators->count() }}</span> </th>
                            </tr>
                            @endforeach
                    </tbody>    

                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="2"><span class="badge badge-primary">Total Indicator Weights:</span></td>
                            <td class="right font-weight-bold"><span class="badge badge-danger">{{ $indicatorgroups->sum('total_indicators')}}</span></td>
                        </tr>
                    </tfoot>
                    
                </table>

        </div>
    

  
@endsection
