@extends('layouts.frontend')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DashBoard</h6>
    </div>
    <div class="card-body text-center">
       <p> Select Rank , Implementing Unit and Financial Year</p>

        <livewire:rankunitdropdown /> 
    </div>
</div>
