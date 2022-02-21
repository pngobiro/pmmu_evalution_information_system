@extends('layouts.main')

@section('content')
        
<div class="card card bg-light">
    <div class="card-body">
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



<div class="card text-white ">
    <div  class="card-body text-primary">
            @forelse($indicatorgroups as $group)
                        <h4> <b> {{ $group->id }}- {{ $group->name }} </b></h4>
                                    <table class="table table-bordered table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#Id</th>
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
                                                <th scope="row">{{ $indicator->id }}</th>
                                                    <td>{{ $indicator->name }}</td>
                                                    <td>{{ $indicator->type->name }}</td>
                                                    <td>{{ $indicator->measure->name }}</td>
                                                    <td>{{ $indicator->indicator_weight }}</td>
                                                    <td>{{ $indicator->indicator_target  }}</td>
                                                    <td> {!! Form::number('integer', $value = $indicator->indicator_achivement , ['class' => 'form-control']) !!}</td>
                                                    <td> </td>
                                            </tr>
                                          
                                          
                                        </tbody>
                                        @empty
                                        @endforelse 
                                    </table>
                                           


                                        
        @endforeach    
    </div>
</div>

<div class="card card bg-light">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <div class="row">
                 <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Download Complete PDF Scoresheet', ['class' => 'btn btn-lg btn-primary pull-right'] ) !!}
                        </div>
                </div>

         
            <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Download Simple PDF Scoresheet ', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
            </div>
        </div>

    </div>
</div>
 

@endsection