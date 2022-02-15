@extends('layouts.main')

@section('content')


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
            
                    <th scope="col">  Unit Type </th>
                    <th> Unit </th>
                    <th>  Financial Year </th>
      
                </tr>
            </thead>
            <tbody>

            <tbody>

            <tr>

                <th>Magistate </th>
                <th> Ukwala Magistrate Court </th>
                <th> 2020/2021 </th>

            </tr>    

        </tbody>
    </table>



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
                        <form method="GET" action="{{ route('indicator-groups.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator Group">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  
                </div>
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

                                        <table class="table table-bordered border-primary">
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
                                                    <td> {{  Form::number('name', 'value') }}</td>
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
@endsection
