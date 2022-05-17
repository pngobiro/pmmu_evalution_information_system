@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    
    <div class="card  ">
        <div class="jumbotron">
            <h1 class="display-8">{{ $unit->name }}</h1>
            
            
            @if ($unit->has_pmmu_division )
                <h2 class="display-8">{{ $division->name }}</h2>
            @endif
                
            
            
            
            <p class="lead">FY {{ $fy->name }}</p>
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
                    <div class="col">
                            <div class="form-row align-items-center">

                                <div class="col">
                                    <a href="{{ route('pmmu', [$unit_rank->id,$unit->id , $division->id, $fy->id ]) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Preview PMMU </a>
                                </div>

                                <div class="col">
                                    <a href="{{ route('update_targets', [$unit_rank->id,$unit->id , $division->id, $fy->id]) }}" class="btn btn-warning"> <i class="fa fa-refresh" aria-hidden="true"></i> Update Targets </a>
                                </div>

                                <div class="col">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-plus" aria-hidden="true"> </i>  Create New Group
                                        </button>
                                </div>

                            </div>
                    </div>
                
                </div>
            </div>
            <div class="card-body">
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
                        @forelse ($indicatorgroups  as $group)
                            <tr>
                                <th> <b>{{ $group->order }} </b></th>
                                <th> {{ $group->name }} </th> 
                                <th> <span class="badge badge-primary">{{ $group->total_indicators}}</span> </th> 

                                <!-- edit group pop modal -->
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $group->id }}">
                                        Edit
                                    </button>
                                </td>



                

                                <th> <a href="{{ route('unit-ranks.units.divisions.fy.indicator-groups.indicators.index', [$unit_rank->id ,$unit->id,$division->id,$fy->id,$group->id]) }}", class="btn btn-success" >Indicators <span class="badge bg-secondary">{{ $group->indicators->count() }}</span> </th>
                            </tr>
                            @endforeach
                    </tbody>    

                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="2"><span class="badge badge-primary">Total Indicator Weights:</span></td>
                            <td class="right font-weight-bold"><span class="badge badge-danger">{{ $indicatorgroups->sum('total_indicators')}}</span></td>
                        </tr>
                    </tfoot>
                    
                </table>

        </div>
    

  
@endsection


<!-- create New Group Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Indicator Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('unit-ranks.units.divisions.fy.indicator-groups.store',[$unit_rank->id,$unit->id,$division->id,$fy->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Indicator Group Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Indicator Group Name">
            </div>
            <div class="form-group">
                <label for="weight">Indicator Group Weight</label>
                <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter Indicator Group Weight">
            </div>
            <div class="form-group">
                <label for="order">Indicator Group Order</label>
                <input type="number" class="form-control" name="order" id="order" placeholder="Enter Indicator Group Order">
            </div>
            <div class="form-group">
                <label for="description">Indicator Group Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Enter Indicator Group Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<!-- edit  Group Modal -->
@foreach ($indicatorgroups as $group)

    <div class="modal fade" id="exampleModal{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Indicator Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('unit-ranks.units.divisions.fy.indicator-groups.update',[$unit_rank->id,$unit->id,$division->id,$fy->id,$group->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Indicator Group Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Indicator Group Name" value="{{ $group->name }}">
                        </div>
               
                        <div class="form-group">
                            <label for="order">Indicator Group Order</label>
                            <input type="number" class="form-control" name="order" id="order" placeholder="Enter Indicator Group Order" value="{{ $group->order }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Indicator Group Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Indicator Group Description">{{ $group->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

                        





            




