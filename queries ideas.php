


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