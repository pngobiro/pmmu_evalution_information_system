@extends('layouts.main')

@section('content')

<div>

    @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

    @endif

</div>

<div>
     <livewire:excel-reports-dropdown/> 
</div>




@endsection