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
                    <div class="col">
                        <form method="GET" action="{{ route('unit-ranks.fy.show',[$unit_rank->id,$fy->id ]) }}">
                            <div class="form-row align-items-center">
                             
                                <div class="col">
                                    <a href="{{ route('unit-ranks.fy.rank_category.template-groups.index', [$unit_rank->id,$fy->id,$rank_category->id]) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                        Preview PMMU Template </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.fy.rank_category.template-groups.create',[$unit_rank->id,$fy->id,$rank_category ]) }}" class="btn btn-primary mb-2"><i class="fa fa-plus" aria-hidden="true"></i>
                            Create New Group </a>
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
                                {{-- order by indicator order field --}}

                                          <th> <span class="badge badge-pill badge-info">{{ $group->template_indicators->sum('indicator_weight')}}</span> </th> 
                                <th> <a href="{{ route('unit-ranks.fy.rank_category.template-groups.edit', [$unit_rank->id,$fy->id ,$rank_category->id, $group->id]) }}"> <i class="fas fa-edit"></i> Edit Group</a>   </th>
                                <th> <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.index', [$unit_rank->id,$fy->id,$group->id]) }}", class="btn btn-success" >Template Indicators <span class="badge bg-secondary">{{ $group->template_indicators->count() }}</span> </th>
                            </tr>
                            @endforeach
                    </tbody>  
                    
                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="2"><span class="badge badge-pill badge-danger">Grand Total Weights:</span> </td>
                            <td class="right"><span class="badge badge-pill badge-danger">{{ $templateindicatorgroups->sum('total_indicators')}}</span></td>
                            {{-- <td class="right">{{ $group->indicators->sum('indicator_weight')}}</span></td> --}}
                        </tr>
                    </tfoot>
                    
                </table>
            </div>
        


</div> 
  
@endsection

<!-- create a modal for creation , editing and deletion of the indicator groups -->
@section('modals')

<div class="modal fade" id="create-indicator-group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Indicator Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category->id]) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Indicator Group Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Indicator Group Name">
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" placeholder="Order">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

