@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div >
            <select class="form-control" name="product_id">

                <option>Select Item</option>
            
                @foreach ($items as $key => $value)
            
                    <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
            
                        {{ $value }} 
            
                    </option>
            
                @endforeach    
            
            </select>
            <select class="form-control" name="product_id">

                <option>Select Item</option>
            
                @foreach ($items as $key => $value)
            
                    <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
            
                        {{ $value }} 
            
                    </option>
            
                @endforeach    
            
            </select>
            <select class="form-control" name="product_id">

                <option>Select Item</option>
            
                @foreach ($items as $key => $value)
            
                    <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
            
                        {{ $value }} 
            
                    </option>
            
                @endforeach    
            
            </select>
        </div>
    </div>
@endsection
