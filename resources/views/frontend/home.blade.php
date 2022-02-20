@extends('layouts.frontend')

@section('content')

<div>

    @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

    @endif

</div>

<div>
    <livewire:rankunitdropdown />
</div>
@endsection
