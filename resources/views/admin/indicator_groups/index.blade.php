@extends('layouts.main')

@section('content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <div class="card  mx-auto">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Unit Type</th>
                            <th> Unit</th>
                            <th> Financial Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                    <th> {{ $rank_name }}</th>
                    <th> {{ $unit_name }} </th>
                    <th> {{ $fy_name  }} </th>
                </tr>    
            </tbody>
            </table>
        </div>

        <div class="row" class="center">
            <h2>overall score</h2>
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
                
                <div class="card-body">
                    <table class="table table-striped">
                        <thead  class="table-dark">
                            <tr>
                            
                                <th scope="col"> </th>
        
                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($indicatorgroups as $group)
                                <tr>
                            
                                    <th  class="table-primary"><b>{{ $group->name }} </b></th>

                                            <table>
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

                                                    @empty

                                                    <p> No Indicators </p>
                                                
            
            
                                                    @endforelse
            

                                                </tbody>
                                            </table>

                                        
                                    
                                
                                    
                                    </td>

                                
                                
                                
                            
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Download Complete PDF Scoresheet', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Download Simple PDF Scoresheet ', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>

    </div>
@endsection
