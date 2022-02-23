@extends('layouts.main')

@section('content')
        
<div class="card bg-light">
    <div class="card-body fs-3">
                <div class="row">
                      <div class="col-sm-4">Unit Type</div>
                      <div class="col-sm-4">Unit</div>
                      <div class="col-sm-4">Financial Year</div>
                </div>

                <div class="row">
                      <div class="col-sm"> {{ $unit_rank->name }}</div>
                      <div class="col-sm"> {{ $unit->name }}</div>
                      <div class="col-sm"> {{ $fy->name  }} </div>
                </div>
               
  
    </div>
</div>





<livewire:update-pmmu />

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
        </div>

    </div>
</div>
 

@endsection