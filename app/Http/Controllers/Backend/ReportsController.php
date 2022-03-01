<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;
use App\Models\IndicatorGroup;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    
    public function index()
    {
       
        return view('admin.reports.index');
    }

    public function excel_reports(){


        return view('admin.reports.excel_reports');


    }



    public function test_report(){

        $units = Unit::where('unit_rank_id',6);

        $fy = FinancialYear::find(4);


        // DB::table('indicators')
        //  ->select('*')
        //  ->join('units', function ($join) {
        //     $join->on('students.std_id', '=', 'results.student_results_id')->groupBy('results.academic_year'); 
        //  })
        // ->where('student_results_id', $std_id)
        //->get();




        
        $indicatorgroups = IndicatorGroup::where('unit_rank_id',6)->where('financial_year_id',4)->get();


          
                                            



                    return view('admin.reports.test_report',compact('units','indicatorgroups','units','fy'));
    
    
    }

}



