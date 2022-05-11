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
                        <!-- create modal button -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"data-target="#createModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create Master Indicator
                        </button>
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
                                    <!-- edit modal button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"data-target="#editModal{{ $indicator->id }}">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Edit 
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
        
            
   

</div>
@endsection

<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Master Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.master-indicator.store',$rank_id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
            
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
@foreach ($indicators as $indicator)
<div class="modal fade" id="editModal{{ $indicator->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Master Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.master-indicator.update',[$rank_id,$indicator->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $indicator->name }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


