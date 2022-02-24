@extends('layouts.main')

@section('content')
        
<div class="card bg-light">
    <div class="card-body fs-3">
            <div class="row">
                <div class="col-sm-4 font-weight-bold">Unit Type</div>
                <div class="col-sm-4 font-weight-bold">Unit</div>
                <div class="col-sm-4 font-weight-bold">Financial Year</div>
            </div>
            <div class="row">
                <div class="col-sm"> {{ $unit_rank->name }}</div>
                <div class="col-sm"> {{ $unit->name }}</div>
                <div class="col-sm"> {{ $fy->name  }} </div>
            </div>
    </div>
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
                        <th scope="col">Achivement (%)</th>
                        <th scope="col">Score</th>
                    </tr>
                </thead>     
                <tbody>
                    @forelse ($group->indicators as $indicator)
                    <tr>
                        <th scope="row">{{ $indicator->order }}</th>
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;">{{ $indicator->name }}</td>
                        <td>{{ $indicator->type->name }}</td>
                        <td>{{ $indicator->measure->name }}</td>
                        <td>{{ $indicator->indicator_weight }}</td>
                        <td>{{ $indicator->indicator_target  }}</td>
                        <td> <input type="text"  class="form-control"  value="{{ $indicator->indicator_achivement }}"></td>
                        <td> </td>
                    </tr>
                </tbody>
                @empty
                @endforelse 
                <tfoot>
                    <tr>
                        <td class="right font-weight-bold" colspan="4">Group Total Weights:</td>
                        <td class="right">{{$group->indicators->sum('indicator_weight')}}</span></td>
                    </tr>
                </tfoot>
            </table>
        </div>

@endforeach    
</div>
</div>
 
 
 {{-- <button wire:click="doSomething">Do Something</button> --}}
 
 


<div class="card bg-light">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <div class="row">
                 <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Download Complete PDF Scoresheet', ['class' => 'btn btn-sm btn-primary pull-right'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Download Simple PDF Scoresheet ', ['class' => 'btn btn-sm btn-info pull-right'] ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                           <button> <a href="{{ route('download_template', [$unit_rank->id,$unit->id,$fy->id]) }}" class="btn btn-sm btn-secondary pull-right">Download Template </a> </button>
                        </div>
                    </div>



                </div>
            </div>
        </div>
</div>

@endsection