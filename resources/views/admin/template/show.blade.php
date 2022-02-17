@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $rank_name }} {{ $fy_name }} Template</h1>
    </div>
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
                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Create Group Indicator</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col"> Indicator Group Name</th>
                            <th scope="col"> Description</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Indicators</th>
                
                
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($indicatorgroups as $group)
                            <tr>
                                <th> <b>{{ $group->id }} </b></th>
                                <th> <b>{{ $group->name }} </b></th> 
                                <th> <b>{{ substr($group->description,0,30)}} </b></th> 
                                <th> <a href="{{ route('unit-ranks.fy.indicator-groups.edit', [$rank_id,$fy_id , $group->id]) }}", class="btn btn-success">Edit</a>  </th>
                                <th> <a href="{{ route('unit-ranks.fy.indicator-groups.indicators.index', [$rank_id,$fy_id,$group->id]) }}", class="btn btn-success">Indicators</a>  </th>
                            </tr>
                            @endforeach
                    </tbody>    
                    
                </table>
            </div>
        </div>
    </div>
@endsection
