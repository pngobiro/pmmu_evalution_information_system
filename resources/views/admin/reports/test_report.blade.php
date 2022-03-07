@extends('layouts.main')

@section('content')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">PMMU Master Excel</h1>
                 
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        
                          <h6 class="m-0 font-weight-bold text-primary">  <a href="{{ route('file-export') }}"> Download Excel</a> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <tr>
                                    <td></td>
                                      

                                    @foreach ($grouped as $item => $collection )
                      
                                    @foreach ($collection  as $c )

                                            <td colspan="3">{{ $c['indicator_name'] }} </td>
                                     

                                       
                                          
                                            @endforeach

                                    
                                       
                                       
                                           
                                    @endforeach
                                   </tr>

                                    <tr>
                                        <td></td>
                                   @foreach ($grouped as $item => $collection )
                                   
                                   @foreach ($collection  as $c )

                                         
                                        <td> Indicator Target</td>
                                        <td> Indicator Achievement</td>
                                         <td> Performance  Score</td>
                                    
                                        @endforeach
                                        
                                        @endforeach
                                    </tr>

                                    <tr>

                                    @foreach ($grouped as $item => $collection )

                                   
                                        <td>{{ $item }}</td>
                                      
                                
                                            @foreach ($collection  as $c )
                                
                                            <td>{{ $c['indicator_target'] }} </td>
                                            <td>{{ $c['indicator_achievement'] }} </td>
                                            <td>{{ $c['performance_score'] }} </td>
                                          
                                            @endforeach
                                
                                   
                                      </tr>

                                      @endforeach
                                
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



@endsection