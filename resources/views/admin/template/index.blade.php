@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $rank_name }} Templates</h1>
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
   
                   
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fys as $fy)
                            <tr>
                                <th scope="row">{{ $fy->id }}</th>

                                <th><a href="{{ route('rank_categories', [$rank_id ,$fy->id]) }}" class="btn btn-success">{{ $fy->name }}</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


