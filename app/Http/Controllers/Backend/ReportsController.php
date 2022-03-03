<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;
use App\Models\IndicatorGroup;
use App\Models\MasterIndicator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Excel;
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

    $units = Unit::where('unit_rank_id',6)->get();
    $indicatorgroups = IndicatorGroup::with('unit')->where('unit_rank_id',6)->where('financial_year_id',4)->get();
    $keyed= collect();
    foreach ( $indicatorgroups as $group){
            foreach ($group->indicators as $indicator){
                $keyed->push(['court_name' => $group->unit->name ,'indicator' => $indicator->master->name ,'score'=> $indicator->indicator_score]);
            }    
    }
    $grouped = $keyed->groupBy('court_name')->all();

    return view('admin.reports.test_report',compact('grouped','indicatorgroups'));
    
    
    }


   

    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'Magistrate Court FY 2021-22.xlsx');
    }

}



