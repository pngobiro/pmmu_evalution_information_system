

<h3> PERFORMANCE MANAGEMENT & MEASUREMENT UNDERSTANDING ANALYSIS </h3>

<h3>{{ $unit->name}}</h3>
<h4> PERFORMANCE FOR THE YEAR {{ $fy->name }}</h4>
<h6> Generated on : {{ date("d-m-Y H:i:s"); }} PM </h6>
 
 
 @foreach($indicatorgroups as $group)

<h3 class="m-0 font-weight-bold text-primary"> {{ $group->order }} - {{ $group->name }}</h3>
      
<div>
    <table class="table table-bordered table table-sm text-dark" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Indicator </th>
                <th scope="col">Indicator Type</th>
                <th scope="col">Unit of Meaure</th>
                <th scope="col">Weight</th>
                <th scope="col">Target </th>
                <th scope="col">Achivement (%)</th>
                <th scope="col">Percentage Performance (%)</th>

                
        
            </tr>
        </thead>     
        <tbody>

            @foreach ($group->indicators as $indicator)
            <tr>
                <th scope="row">{{$indicator->order}} .</th>
                <td style="word-wrap: break-word;min-width: 450px;max-width: 450px;">{{ $indicator->name }}</td>
                <td>{{ $indicator->type->name }}</td>
                <td>{{ $indicator->measure->name }}</td>
                <td>{{ $indicator->indicator_weight }}</td>
                <td>{{ $indicator->indicator_target  }}</td>
                <td>{{ $indicator->indicator_achivement }}</td> 
                <td><b>{{ $indicator->indicator_performance_score }}</b> </td>

                
            </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>
                <td class="right font-weight-bold" colspan="5"><b>Group Total Weights:</b></td>
                <td class="right font-weight-bold"><b>{{ $group->total_indicators }}</b></span></td>
            </tr>
        </tfoot>
    </table>


</div>

@endforeach 
</div>

<button type="button" class="btn btn-info">
Grand Weights Total: <span class="badge badge-light">{{ $indicatorgroups->sum('total_indicators')}}</span>
</button>