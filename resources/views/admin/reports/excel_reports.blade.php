@extends('layouts.main')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Download Excel Report</h6>


    </div>
    <div class="card-body">
        <livewire:excel-reports-dropdown/> 
    </div>
</div>









@endsection