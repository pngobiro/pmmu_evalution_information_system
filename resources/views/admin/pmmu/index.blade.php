@extends('layouts.frontend')

@section('content')


<div class="jumbotron">
    <h1 class="display-8">{{ $unit->name }}  @if ($unit->has_pmmu_division ) <h2 class="display-8">{{ $division->name }}</h2> @endif - FY {{ $fy->name  }}</h1>
    <p class="lead"><span class="badge badge-pill badge-primary">Group :</span>  {{  $indicator_group->name }}</p>
  </div>

  <!-- show flash message if session contains message-->
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    

<div class="row">
    <div class="card  mx-auto">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form method="GET" action="{{ route('unit-ranks.units.divisions.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id]) }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                    placeholder="Search by indicator name ...">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                            </div>
                            <div>
                                <a href="{{ route('unit-ranks.units.divisions.fy.indicator-groups.index',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id]) }}" class="btn btn-secondary mb-2"><i class="fa fa-eye" aria-hidden="true"></i>View All Groups</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create New Indicator
                    </button>

                </div>
            </div>
        </div>
        <div class="card-body">

                <table   class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th scope="col">Order</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Indicator Type</th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Indicator Weight</th>
                            <th scope="col">Indicator Target</th>
                            <th scope="col">Is Backlog</th>
                            <th scope="col">Edit</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators  as $indicator)
                            <tr>
                                <td>{{ $indicator->order  }}</td>
                                <td style="word-wrap: break-word;min-width:350px;max-width: 350px;">{{ $indicator->name  }}</td>
                                <td >{{ $indicator->type->name }}</td>
                                <td>{{ $indicator->measure->name }}</td>
                                <td><span class="badge badge-primary">{{ $indicator->indicator_weight }}</span> </td>
                                <td><span class="badge badge-danger">{{ $indicator->indicator_target }}</span></td>

                                <td>
                                    @if ($indicator->is_backlog_indicator)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif

                                </td>

                                <!-- edit indicator pop modal -->
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $indicator->id }}">
                                        <i class="fa fa-edit" aria-hidden="true"></i>  Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="right" colspan="4"><span class="badge badge-primary">Total Weights:</span> </td>
                            <td class="right"><span class="badge badge-pill badge-primary">{{ $indicator_group->indicators->sum('indicator_weight')}}</span> </span></td>
                        </tr>
                    </tfoot>
                </table>

          
            </div>
        
    </div>
</div>





@endsection

<!-- create new indicator pop modal -->
    

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.units.divisions.fy.indicator-groups.indicators.store',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Indicator Name">
                    </div>
                    <div class="form-group">
                        <label for="indicator_type_id">Indicator Type</label>
                        <select class="form-control" name="indicator_type_id" id="indicator_type_id">
                            @foreach ($indicator_types as $indicator_type)
                                <option value="{{ $indicator_type->id }}">{{ $indicator_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="indicator_unit_of_measure_id">Indicator Unit of Measure</label>
                        <select class="form-control" name="indicator_unit_of_measure_id" id="indicator_unit_of_measure_id">
                            @foreach ($measures as $measure)
                                <option value="{{ $measure->id }}">{{ $measure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="indicator_weight">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" placeholder="Indicator Weight">
                    </div>
                    <div class="form-group">
                        <label for="indicator_target">Indicator Target</label>
                        <input type="number" class="form-control" name="indicator_target" id="indicator_target" placeholder="Indicator Target">
                    </div>
                    <div class="form-group">
                        <label for="is_backlog_indicator">Is Backlog Indicator</label>
                        <select class="form-control" name="is_backlog_indicator" id="is_backlog_indicator">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="order">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" placeholder="Indicator Order">
                    </div>
              
                    <div class="form-group">
                        <label for="remarks">Indicator Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Indicator Remarks"></textarea>
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

<!-- edit indicator pop modal -->
@foreach ($indicators as $indicator)

<div class="modal fade" id="exampleModal{{ $indicator->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit  Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.units.divisions.fy.indicator-groups.indicators.update',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id,$indicator->id]) }}">
                    @csrf
                    @method('PUT')
                 <div class="form-group">
                    <label for="exampleInputEmail1">Master Indicator Type</label>
                    <select class="form-control" name="master_indicator_id" id="master_indicator_id" aria-describedby="emailHelp"
                        placeholder="Select Master Indicator" required>
                        <option value="">Select Master Indicator</option>
                        @foreach($master_indicators as $master_indicator)
                            <option value="{{ $master_indicator->id }}" @if($indicator->master_indicator_id == $master_indicator->id) selected @endif>{{ substr($master_indicator->name, 0, 50)  }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Name" required value="{{ $indicator->name }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Type</label>
                        <select class="form-control" name="indicator_type_id" id="indicator_type_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Type" required>
                            @foreach ($indicator_types as $type)
                            <option value="{{ $type->id }}" @if($indicator->indicator_type_id == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Unit of Measure</label>
                        <select class="form-control" name="indicator_unit_of_measure_id" id="indicator_unit_of_measure_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Unit of Measure" required>
                            @foreach ($measures as $measure)
                            <option value="{{ $measure->id }}" @if($indicator->indicator_unit_of_measure_id == $measure->id) selected @endif>{{ $measure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Weight" required value="{{ $indicator->indicator_weight }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Order" required value="{{ $indicator->order }}">
                    </div>
                    <!-- is_backlog_indicator -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Is Backlog Indicator</label>
                        <select class="form-control" name="is_backlog_indicator" id="is_backlog_indicator" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Order" required>
                            <option value="0" @if($indicator->is_backlog_indicator == 0) selected @endif>No</option>
                            <option value="1" @if($indicator->is_backlog_indicator == 1) selected @endif>Yes</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
