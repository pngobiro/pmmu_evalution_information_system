@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
 
    <div class="card shadow mb-4">
   
      
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
                        <form method="GET" action="{{ route('unit-ranks.master-indicator.index',$rank_id) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Master Indicator">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.master-indicator.create',$rank_id) }}" class="btn btn-primary mb-2">Create Master Indicator</a>
                    </div>
                </div>
            </div>
           
                <div class="card-body">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $rank_name }} Master Indicators</h6>
                    </div>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators as $indicator)
                            <tr>
                                <th scope="row">{{ $indicator->id }}</th>
                                <td>{{ $indicator->name }}</td>
                               <td>
                                    <a href="{{ route('unit-ranks.master-indicator.edit',[$rank_id,$indicator->id]) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
        
            
   

</div>
@endsection