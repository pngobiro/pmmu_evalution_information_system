@extends('layout')
@section('content')
<table >
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Indicator </th>
            <th scope="col">Indicator Type</th>
            <th scope="col">Unit of Meaure</th>
            <th scope="col">Weight</th>
            <th scope="col">Target </th>
            <th scope="col">Achivement (%)</th>
            <th scope="col">Score</th>
        </tr>
    </thead>     
    <tbody>
                @forelse ($group->indicators as $indicator)

                <h2> {{ $group->id }}- {{ $group->name }} </h2

                <tr>
                    <th scope="row">{{ $indicator->order }}</th>
                        <td>{{ $indicator->name }}</td>
                        <td>{{ $indicator->type->name }}</td>
                        <td>{{ $indicator->measure->name }}</td>
                        <td>{{ $indicator->indicator_weight }}</td>
                        <td>{{ $indicator->indicator_target  }}</td>
                        <td> {{ $indicator->indicator_achivement  }}</td>
                        <td> {{ $indicator->score }}</td>
                </tr>

</tbody>

    @empty


    @endforelse 

    
</table>
   


@endforeach    

@endsection