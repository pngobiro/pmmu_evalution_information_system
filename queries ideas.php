


         //   $indicators = DB::table('indicators')->join('indicator_groups', 'indicators.indicator_group_id', '=', 'indicator_groups.id')->get();

// var_dump($indicators);


//  $indicatorgroups = DB::table('indicator_groups')
//    ->join('units', 'units.id', '=', 'indicator_groups.unit_id')
//    ->join('indicators', function ($join)
//    {$join
//             ->on('indicator_groups.id', '=', 'indicators.indicator_group_id')
//            ->where('indicator_groups.unit_rank_id', '=', 6)
//            ->where('indicator_groups.financial_year_id', '=', 4)
//          ->groupBy('unit_id');
//    })
 
//  ->get()->dd();



$results= collect([

 'Bomet' =>  ['certied' => 16 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Ogembo' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Iten' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Busia' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Machakos' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Migori' =>  ['certied' => 56 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Kerugoya' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Tamu' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],
 'Malindi' =>  ['certied' => 6 ,'injunctions'=> 45 , 'all other applications' => 89,'Hearing Criminal cases-360' => 78 , 'Hearing Civil cases' => 99],


]);



$keyed = $indicator->mapWithKeys(function ($item, $key) {
                    return [$group['name'] => $item['name']];
                });
                 
                $keyed->all();


                https://laravel.com/docs/8.x/collections#method-mapwithkeys


                <tr>
                                            <td>{{$item}} </td>

                                            <td>{{ $collection}} </td>
                                            <td>{{ $collection ->keyBy('score')}} </td>
                                         
                                       
                                    
                                        </tr>

                                        $keyed= collect();

foreach ( $indicatorgroups as $group){
    foreach ($group->indicators as $indicator){
        $keyed->push(['court_name'=>$group->unit->name ,'score'=> $indicator->indicator_performance_score,'indicator'=>$indicator->master->name]);
    }
}

$grouped = $keyed->groupBy('court_name')->all();
$indicators_list =  $keyed->pluck('indicator')->unique();

@extends('layouts.main')

@section('content')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">PMMU Master Excel</h1>
                 
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        
                          <h6 class="m-0 font-weight-bold text-primary">  <a href="{{ route('file-export') }}"> Download Excel</a> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>





                                        
                                        <tr>
                                        <th> Court Name </th>
                                        @foreach ( $indicators_names_list as $name)
                            
                                                <th>{{ $name}}</th> 
                                          
                                        @endforeach
                                        </tr>
                                   
                                    </thead>
                    
                                    <tbody>
                                        @foreach ($grouped as $item => $collection)
                                                                          
                
                                        <tr>
                                            <td>{{$item}} </td>

                                        @foreach ($collection  as $c )

                                          <td>{{ $c['score'] }} </td>
                                            
                                        @endforeach
                                    
                                        </tr>
                                      
                                    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



@endsection