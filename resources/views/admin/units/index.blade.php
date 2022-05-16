@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> {{ $unit_rank->name }} Implementing Units</h1>
    </div>
    <div class="row">
        <div class="card ">
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
                        <form method="GET" action="{{ route('unit-ranks.units.index',$unit_rank->id)}}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="e.g Kakamega">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('unit-ranks.units.create',[$unit_rank->id])}}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Unit Rank</th>
                            <th scope="col">Has PMMU Division</th>
                            <th scope="col">Edit</th>
                            <th scope="col">View</th>
              
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr>
                                <th scope="row">{{ $unit->id }}</th>

                                <td>{{ $unit->name }}</td>
                            
                                <!-- update unit->has_pmmu_division  with a check box-->
                                <td>
                                    <form method="POST" action="{{ route('update-has-pmmu-division',[$unit->id])}}">
                                        @csrf
                                        @method('POST')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="has_pmmu_division"
                                                id="has_pmmu_division" value="1" {{ $unit->has_pmmu_division ? 'checked' : '' }}>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    
                                 
                                 <td><a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-success">Edit</a></td>

                             

                           
                        
                                <td><a href="{{ route('unit-ranks.units.fy.index', [$unit_rank->id ,$unit->id]) }}" class="btn btn-success">FY</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#has_pmmu_division').change(function () {
                var has_pmmu_division = $(this).is(':checked');
                var unit_id = $(this).data('unit-id');

                $.ajax({
                    url: "{{ route('update-has-pmmu-division', [$unit_rank->id, 'unit_id']) }}".replace('unit_id', unit_id),
                    method: 'POST',
                    data: {
                        has_pmmu_division: has_pmmu_division
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
 
@endsection



