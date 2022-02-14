<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;


class HomeController extends Controller



{

 

    
    public function index(Request $request)
    {
        $items = Unit::pluck('name', 'id');

        $selectedID = 2;
     
        return view('frontend.home')
        ->with([
            'items' => $items,
            'selectedID' =>  $selectedID,
            //'dataset2' => $dataset2,
            //'dataset3' => $dataset3,
            //'dataset4' => $dataset4,
            ]); 
        
    }
    
    
    

}
