@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="card">
        <div class="card-body">
    
    <div class="d-flex justify-content-center .mb-15" >
        <div class="row ">
            <h1 class="h3 mb-0 text-gray-800">{{ $unit_rank->name }} - {{ $rank_category->name }} -  FY {{ $fy->name }} Template</h1>
        </div>
       
    </div>
        
</div>
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
                        <form method="GET" action="{{ route('unit-ranks.fy.show',[$unit_rank->id,$fy->id ]) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator Group">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>

                                <div class="col">
                                    <a href="{{ route('unit-ranks.fy.rank_category.template-groups.index', [$unit_rank->id,$fy->id,$rank_category->id]) }}" class="btn btn-success">Preview PMMU Template </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.fy.rank_category.template-groups.create',[$unit_rank->id,$fy->id,$rank_category ]) }}" class="btn btn-primary mb-2">Create New Group </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col"> Indicator Group Name</th>
                            <th scope="col"> Description</th>
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
                                <th> <b>{{ substr($group->description,0,10)}} </b></th> 
                                <th> <b> {{ $group->template_indicators->sum('indicator_weight')}}</b></th> 
                                <th> <a href="{{ route('unit-ranks.fy.rank_category.template-groups.edit', [$unit_rank->id,$fy->id ,$rank_category->id, $group->id]) }}"> Edit</a>   </th>
                                <th> <a href="{{ route('unit-ranks.fy.rank_category.template-groups.template-indicators.index', [$unit_rank->id,$fy->id,$rank_category->id,$group->id]) }}", class="btn btn-success" >Template Indicators <span class="badge bg-secondary">{{ $group->template_indicators->count() }}</span> </th>
                            </tr>
                            @endforeach
                    </tbody>  
                    
                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="3">Grand Total: </td>
                            <td class="right"> </td>
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