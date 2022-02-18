<table>
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
<tr>
<th scope="row">{{ $indicator->id }}</th>
<td>{{ $indicator->name }}</td>
<td>{{ $indicator->type->name }}</td>
<td>{{ $indicator->measure->name }}</td>
<td>{{ $indicator->indicator_weight }}</td>
<td>{{ $indicator->indicator_target  }}</td>
<td> {!! Form::number('integer', $value = $indicator->indicator_achivement , ['class' => 'form-control']) !!}</td>
<td> </td>
</tr>
@empty
<p> No Indicators </p>  


@endforelse   
     
