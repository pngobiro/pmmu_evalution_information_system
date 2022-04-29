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
                        <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.create',[$unit_rank->id,$fy->id,$template_group->id]) }}" class="btn btn-primary mb-2"><i class="fa fa-plus" aria-hidden="true"></i> Create New Template Indicator</a>
                        <!-- open modal -->
                     
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
                                    <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.edit', [$unit_rank->id,$fy->id,$template_group->id,$indicator->id]) }}" class="btn btn-success"><i class="fas fa-edit"></i>Edit</a>
                            
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




