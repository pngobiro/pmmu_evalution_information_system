@extends('layouts.main')

@section('content')

    <div class="card ">
        <div class="card-body text-monospace">
            <div class="d-flex flex-column bd-highlight mb-3">
                <h1 class="h3 mb-0 text-gray-800">{{ $unit_rank->name }} - {{ $fy->name  }} </h1>
                <h2 class="h5 mb-0 text-gray-800"> Group : {{  $template_group->name }} </h2>
                <h4 class="h6 mb-0 text-gray-800"> Group Description: {{  $template_group->description  }} </h4>
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
                        <form method="GET" action="{{ route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id,$fy->id,$template_group->id]) }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search Indicator</button>
                                </div>
                                <div class="col ">
                                    <a href="{{ route('unit-ranks.fy.template-groups.index', [$unit_rank->id,$fy->id]) }}" class="btn btn-success">View All Groups</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.create',[$unit_rank->id,$fy->id,$template_group->id]) }}" class="btn btn-primary mb-2">Create New Template Indicator</a>
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
                                <td>{{ $indicator->indicator_weight }}</td>
                           


                                <td>
                                    <a href="{{ route('unit-ranks.fy.template-groups.template-indicators.edit', [$unit_rank->id,$fy->id,$template_group->id,$indicator->id]) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="4">Grand Total: </td>
                            <td class="right font-weight-bold">{{ $template_group->template_indicators->sum('indicator_weight')}} </td>
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
