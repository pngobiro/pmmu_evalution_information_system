@extends('layouts.main')

@section('content')


<!-- show session message -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!--show session message -->
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif




<!-- write good bye in middle of page -->
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Good Bye</h5>
        </div>
    </div>
</div>