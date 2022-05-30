@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <!-- create a div to Dispaly Flash messages-->

    
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
  
    <div class="d-flex justify-content-center .mb-15" >
        <div class="row ">
            <h1 class="h3 mb-0 text-gray-800">{{ $unit_rank->name }} FY {{ $fy->name }}</h1>
        </div>
    </div>



    <div class="card-header">
        <div class="row">
            <div class="col">
                <form method="GET" action="{{ route('users.index') }}">
                    <div class="form-row align-items-center">
                        <div class="col">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                placeholder="Jane Doe">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
          
            <div class="col">
                <a href="{{ route('unit-ranks.fy.rank_category.create',[$unit_rank->id,$fy->id ]) }}" class="btn btn-primary mb-2">Create</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- Page Heading -->
        
        <p class="mb-4"> </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th scope="col">Category </th>
                            <th scope="col">Descripition </th>
                            <th scope="col">Indicators </th>
                            <th scope="col">Edit </th>
                            <th scope="col">Delete </th>
                        </tr>
                       
                        @foreach ($rank_categories as $rank_category)
                      
                        <tr>
                            <td>{{ $rank_category->name }}</td>
                            <td>{{ $rank_category->description }}</td>
                            <td> <a href="{{ route('unit-ranks.fy.rank_category.template-groups.index',[$unit_rank->id,$fy->id,$rank_category->id]) }}" class="btn btn-success">Indicators</a></td> 
                             

                            <td>
                                <!-- edit rank_category modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $rank_category->id }}">
                                    Edit
                            </td>

                            <td>
                                <form action="{{ route('unit-ranks.fy.rank_category.destroy',[$unit_rank->id,$fy->id,$rank_category->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </tr>
                        
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

         

@endsection

<!-- edit rank_category modal -->
@foreach ($rank_categories as $rank_category)

    <div class="modal fade" id="editModal{{ $rank_category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Rank Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unit-ranks.fy.rank_category.update',[$unit_rank->id,$fy->id,$rank_category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $rank_category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $rank_category->description }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
