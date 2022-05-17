@extends('layouts.main')

@section('content')
        
<div class="card bg-light">
    <div class="card-body fs-4" >
            <div class="row">
                <div class="col-sm-3 font-weight-bold">Unit Type</div>
                <div class="col-sm-3 font-weight-bold">Implementating Unit</div>
                <div class="col-sm-3 font-weight-bold">Financial Year</div>
                <div class="col-sm-2 font-weight-bold"></div>
                <div class="col-sm-1 font-weight-bold"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-primary">{{ $unit_rank->name }}</span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-success">
                    
        
                    @if ($unit->has_pmmu_division ) 

                    {{ $division->name }}  

                    @else 
                    
                    
                    {{ $unit->name }}  
                    
                    
                    @endif
                
                
                </span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-warning">{{ $fy->name  }}</span>  </div>
                <div class="col-sm-2 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="{{ route('pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}">Go to PMMU</a></span>  </div>     
                <div class="col-sm-1 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="{{ route('unit-ranks.units.divisions.fy.indicator-groups.index', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}">Edit Indicators </a></span>  </div>           
            </div>
    </div>
</div>

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div> 



    {{-- <div wire:poll.10s="updateIndicator"> --}} 
<div class="card ">
    <div  class="card-body ">
        @forelse($indicatorgroups as $group)
        <p class="fs-4 text-uppercase font-weight-bold font-monospace"> {{ $group->order }}- {{ $group->name }} </p>
        <div>
            <table class="table table-bordered table table-sm text-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Indicator </th>
                        <th scope="col">Indicator Type</th>
                        <th scope="col">Unit of Meaure</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Target </th>
                       
                
                    </tr>
                </thead>     
                <tbody>
                    @forelse ($group->indicators as $indicator)
                    <tr>
                        <th scope="row">{{ $indicator->order }}</th>
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;">{{ $indicator->name }}</td>
                        <td>{{ $indicator->type->name }}</td>
                        <td>{{ $indicator->measure->name }}</td>
                        <td> <livewire:indicator-weight-form :indicator_id="$indicator->id" >  </td>
                        {{--  <td>{{ $indicator->indicator_achivement }}</td> --}}
                        <td> <livewire:indicator-target-form :indicator_id="$indicator->id" >  </td>
                     
                     

                    </tr>
                </tbody>
                @empty
                @endforelse 
                <tfoot>
                    <tr>
                        <td class="right font-weight-bold" colspan="4">Group Total Weights:</td>
                        <td class="right font-weight-bold">{{ $group->total_indicators }}</span></td>
                    </tr>
                </tfoot>
            </table>


        </div>
        @empty
        @endforelse  

<button type="button" class="btn btn-info">
    Grand Weights Total: <span class="badge badge-light">{{ $indicatorgroups->sum('total_indicators')}}</span>
  </button>
 

 


@endsection