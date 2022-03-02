@extends('layouts.main')

@section('content')
<style> 
th.rotated-text {
    height: 140px;
    white-space: nowrap;
    padding: 0 !important;
}

th.rotated-text > div {
    transform:
        translate(5px, 0px)
        rotate(90deg);
    width: 30px;
}

th.rotated-text > div > span {
    padding: 5px 10px;
}


</style>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        
                                         <th> Court Name</th>

                                     
                                        <th> Court Name</th>
                                        
                                   
                                    </thead>
                    
                                    <tbody>
                                       {{--  @foreach($units  as $unit)--}} 
                                        <tr>
                                            <td>{{$unit->name }} </td>
                                            <td>{{$unit->indicators }} </td>
                                       
                                    
                                        </tr>
                                       {{--  @endforeach --}}
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



@endsection