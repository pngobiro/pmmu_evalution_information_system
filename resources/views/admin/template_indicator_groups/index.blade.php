@extends('layouts.main')

@section('content')

<div class="card">
    <div class="card-body">



    <div class="jumbotron">
        <h1 class="display-15">{{ $unit_rank->name }} - {{ $rank_category->name }}   </h1>
        <p class="lead"> <span class="badge badge-primary">Financial Year</span> {{ $fy->name }} </p>
  </div>



 
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">

                    @if (count($templateindicatorgroups) == 0)
                    <div class="col">
                        <a href="{{ route('download_previous_fy_template', [$unit_rank->id,$fy->id,$rank_category->id]) }}" class="btn btn-success"><i class="fa fa-clone" aria-hidden="true"></i>
                            Copy Template </a>
                            <!--- show infomation hover tip -->
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Copy Template from previuos financial year">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                    </div>
                    @endif

                    <div class="col" >
                        <!-- create modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create Template Indicator Group
                       
                    </div>
                        
                   
       
                </div>
            </div>
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col"> Indicator Group Name</th>
                            <th scope="col"> Weight</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Indicators</th>
                
                
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($templateindicatorgroups as $group)
                            <tr>
                                <th> <b>{{ $group->order }} </b></th>
                                <th> {{ $group->name }} </th> 

                                          <th> <span class="badge badge-pill badge-info">{{ $group->template_indicators->sum('indicator_weight')}}</span> </th> 

                                <th> 

                                    <!-- edit group modal button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $group->id }}">
                                        <i class="fas fa-edit"></i> Edit Group
                                    </button>

 
                                
                                </th>



                                <th> <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.index', [$unit_rank->id,$fy->id,$group->id]) }}", class="btn btn-success" >Template Indicators <span class="badge bg-secondary">{{ $group->template_indicators->count() }}</span> </th>
                            </tr>
                            @endforeach
                    </tbody>  
                    
                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="2"><span class="badge badge-pill badge-danger">Grand Total Weights:</span> </td>
                            <td class="right"><span class="badge badge-pill badge-danger">{{ $templateindicatorgroups->sum('total_indicators')}}</span></td>
                        </tr>
                    </tfoot>
                    
                </table>
            </div>
        


</div> 
  
@endsection

<!-- create a modal for creation , editing and deletion of the indicator groups -->
@section('modals')


<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Template Indicator Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Group Name" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" placeholder="Order" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                    </div>
                
                  
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Template Indicator Group - {{ $unit_rank->name }} - {{ $rank_category->name }}- {{ $fy->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Group Name" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" placeholder="Order" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                    </div>
                
                  
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit group modal -->
@foreach ($templateindicatorgroups as $group)

    <div class="modal fade" id="editModal{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Template Indicator Group - {{  $unit_rank->name  }} - {{ $rank_category->name }} - {{ $fy->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('unit-ranks.fy.rank_category.template-groups.update',[$unit_rank->id,$fy->id,$rank_category->id,$group->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Group Name" value="{{ $group->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" class="form-control" id="order" name="order" placeholder="Order" value="{{ $group->order }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description" required>{{ $group->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
