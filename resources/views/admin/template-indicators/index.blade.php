@extends('layouts.main')

@section('content')


    <div class="jumbotron">
        <h1 class="display-6">{{ $unit_rank->name }} - FY {{ $fy->name  }}</h1>
        <p class="lead"> <span class="badge badge-primary">Group</span>  <b> {{  $template_group->name }}</p>
        <hr class="my-8">
        <p><span class="badge badge-warning">Group Description:</span>   {{  $template_group->description  }}</p>
      </div>

    

    <div class="card">
        <div class="card-body">
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
                        <form method="GET" action="{{ route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id,$fy->id,$template_group->id]) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i>
                                        Search Indicator</button>
                                </div>
                                <div class="col ">
                                    <a href="{{ route('unit-ranks.fy.rank_category.template-groups.index', [$unit_rank->id,$fy->id,$template_group->rank_category]) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View All Groups</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <!--  a link to open modal -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                            <i class="fa fa-plus" aria-hidden="true"></i> Add Indicator</button>

                     
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                           
                            <th scope="col">Order</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Indicator Type</th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Indicator Weight</th>
                            <th scope="col">Edit</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($template_indicators  as $indicator)
                            <tr>
                                
                                <td>{{ $indicator->order  }}</td>
                                <td>{{ $indicator->name  }}</td>
                                <td>{{ $indicator->type->name }}</td>
                                <td>{{ $indicator->measure->name }}</td>
                                <td><span class="badge badge-pill badge-info">{{ $indicator->indicator_weight }}</span></td>
                           


                                <td>
                                    <!-- edit modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $indicator->id }}">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Edit</button>


                            
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="4"><span class="badge badge-success">Group Total Weights</span> </td>
                            <td class="right font-weight-bold"><span class="badge badge-pill badge-danger">{{ $template_group->template_indicators->sum('indicator_weight')}}</span> </td>
                            {{-- <td class="right">{{ $group->indicators->sum('indicator_weight')}}</span></td> --}}
                        </tr>
                    </tfoot>

                </table>
            </div>
     

        </div>
    </div>

       

</div>
</div>

@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Template Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.fy.template-groups.template-indicators.store',[$unit_rank->id,$fy->id,$template_group->id]) }}">
                    @csrf

                 <div class="form-group">
                    <label for="exampleInputEmail1">Master Indicator Type</label>
                    <select class="form-control" name="master_indicator_id" id="master_indicator_id" aria-describedby="emailHelp"
                        placeholder="Select Master Indicator" required>
                        <option value="">Select Master Indicator</option>
                        @foreach($master_indicators as $master_indicator)
                            <option value="{{ $master_indicator->id }}">{{ substr($master_indicator->name, 0, 50)  }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Type</label>
                        <select class="form-control" name="indicator_type_id" id="indicator_type_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Type" required>
                            @foreach ($indicator_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Unit of Measure</label>
                        <select class="form-control" name="indicator_unit_of_measure_id" id="indicator_unit_of_measure_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Unit of Measure" required>
                            @foreach ($measures as $measure)
                            <option value="{{ $measure->id }}">{{ $measure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Weight" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Order" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach ($template_indicators as $indicator)


<div class="modal fade" id="editModal{{ $indicator->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Template Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unit-ranks.fy.template-groups.template-indicators.update',[$unit_rank->id,$fy->id,$template_group->id,$indicator->id]) }}">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach









