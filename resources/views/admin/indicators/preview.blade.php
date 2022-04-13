@extends('layouts.main')

@section('content')
        
<div class="card bg-light">
    <div class="card-body fs-3">
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Unit Type</div>
                <div class="col-sm-4 font-weight-bold">Implementating Unit</div>
                <div class="col-sm-4 font-weight-bold">Financial Year</div>
            </div>
            <div class="row">
                <div class="col-sm m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-primary">{{ $unit_rank->name }}</span> </div>
                <div class="col-sm m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-success">{{ $unit->name }}</span> </div>
                <div class="col-sm m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-warning">{{ $fy->name  }}</span>  </div>
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

        <h6 class="m-0 font-weight-bold text-primary"> {{ $group->order }} - {{ $group->name }}</h6>
      
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
                        <th scope="col">Achivement (%)</th>
                
                    </tr>
                </thead>     
                <tbody>
                    @forelse ($group->indicators as $indicator)
                    <tr>
                        <th scope="row">{{ $indicator->order }}</th>
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;">{{ $indicator->name }}</td>
                        <td>{{ $indicator->type->name }}</td>
                        <td>{{ $indicator->measure->name }}</td>
                        <td><span class="badge badge-pill badge-info">{{ $indicator->indicator_weight }}</span> </td>
                        <td>{{ $indicator->indicator_target  }}</td>
                        <td> <livewire:indicator-form :indicator_id="$indicator->id" >  </td>
                     
                     

                    </tr>
                </tbody>
                @empty
                @endforelse 
                <tfoot>
                    <tr>
                        <td class="right font-weight-bold" colspan="4"><span class="badge badge-pill badge-info">Group Total Weights:</span> </td>
                        <td class="right font-weight-bold"><span class="badge badge-pill badge-danger"> {{ $group->total_indicators }}</span></span></td>
                    </tr>
                </tfoot>
            </table>


        </div>

@endforeach    
</div>

<button type="button" class="btn btn-info">
    Grand Weights Total: <span class="badge badge-danger">{{ $indicatorgroups->sum('total_indicators')}}</span>
  </button>
 
 {{-- <button wire:click="doSomething">Do Something</button> --}}
 
    
        <div class="d-flex justify-content-center">
            <div class="row">
                <button> <a href="{{ route('simple_pmmu', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-primary btn-lg">Download Simple PMMU </a> </button>
                <button> <a href="{{ route('complex_pmmu', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-secondary btn-lg">Download Complex PMMU </a> </button>
                @if(empty($indicatorgroups->toArray()))
                <button> <a href="{{ route('download_template', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-sm btn-secondary pull-right">Download Template </a> </button>
                @endif  
                </div>
        </div>

@endsection