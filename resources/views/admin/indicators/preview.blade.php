@extends('layouts.main')

@section('content')

<div class="card bg-light" >
    <div class="card-body fs-4" >
            <div class="row">
                <div class="col-sm-3 font-weight-bold">Unit Type</div>
                <div class="col-sm-3 font-weight-bold">Implementating Unit</div>
                <div class="col-sm-3 font-weight-bold">Financial Year</div>
                <div class="col-sm-3 font-weight-bold"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-primary">{{ $unit_rank->name }}</span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-success">{{ $unit->name }}</span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-warning">{{ $fy->name  }}</span>  </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="{{ route('update_targets', [$unit_rank->id,$unit->id,$fy->id]) }}">Update Weights and Targets</a></span>  </div>
            </div>
    </div>
</div>



<div class="row">
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div> 

</div>





<div class="card">
    <div  class="card-body ">
        @forelse($indicatorgroups as $group)
        <div class="alert alert-success" role="alert">
            <h6 class="m-0 font-weight-bold text-primary"> {{ $group->order }} - {{ $group->name }}</h6>
        </div>
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
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;">{{ $indicator->name }} </td>
                        <td>{{ $indicator->type->name }}</td>
                        <td>{{ $indicator->measure->name }}</td>
                        <td><span class="badge badge-pill badge-info">{{ $indicator->indicator_weight }}</span> </td>
                        <td>{{ $indicator->indicator_target  }}</td>
                        <td> <livewire:indicator-form :indicator_id="$indicator->id" >  </td>
                    </tr>
                </tbody>
                @empty
                <tr>
                    <td colspan="7">No Indicators</td>
                </tr>
                @endforelse 
                
                <tfoot>
                    <tr>
                        <td class="right font-weight-bold" colspan="4"><span class="badge badge-pill badge-info">Group Total Weights:</span> </td>
                        <td class="right font-weight-bold"><span class="badge badge-pill badge-danger"> {{ $group->total_indicators }}</span></span></td>
                    </tr>
                </tfoot>
            </table>
            @empty
            <div class="alert alert-warning">
                No Indicators 
                <a href="{{ route('download_template', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-info btn-block">Create Indicators</a>
        </div>
        @endforelse
    </div>
</div>


<div class="alert alert-success" role="alert">


<div class="row">

    <div class="col-sm-3">
        <p> Grand Total Weights: <span class="badge badge-primary">{{ $indicatorgroups->sum('total_indicators')}}</span> </p>
    </div>


    <div class="col-sm-3">
        <p> Composite Score: <span class="badge badge-success">{{ round( $total_indicator_weighted_score,3) }}</span> </p>
    </div>

    <div class="col-sm-3">
        <p> Overall Performance Grade: <span class="badge badge-danger"></span> </p>
    </div>


</div>

</div>

<div class="row">

    <div class="col-sm-6">
        <a href="{{ route('simple_pmmu', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-primary btn-sm">Download Complex PMMU</a>
    </div>

    <div class="col-sm-6">
        <a href="{{ route('complex_pmmu', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-success btn-sm ">Download Simple PMMU</a>
    </div>

</div>


@endsection
