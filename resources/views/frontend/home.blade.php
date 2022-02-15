@extends('layouts.frontend')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="text-center">  Search PMMU</h1>



    </div>
    <div class="panel-body">
        <div class="col-md-3"> 
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="rank" id="rank">
                    <option selected="false">
                       Unit Rank
                    </option>
                </select>

        </div>
    

        <div class="col-md-6"> 
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="unit" id="unit">
                <option selected="false">
                   Units
                </option>
            </select>

        </div>

        <div class="col-md-6"> 
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example " name="fy" id="fy">
                <option selected="false">
                    Financal Years
                </option>

                @foreach (  $fys as $fy)

                <option value="{{ $fy->id }}"> {{ $fy->name }}</option>
                    
                @endforeach
            </select>

        </div>


        <div class="col-md-3"> 

            <button class="btn btn-primary btn-lg rounded" type="submit" id="search" name="search" > 

                Search
                <i class="fa fa-search"></i>
            </button>

        </div>



    </div>
</div>
@endsection
