<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\IndicatorGroup;
use App\Models\Indicator;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\FinancialYear;

use Illuminate\Http\Request;

class PmmuController extends Controller
{
    public function index(UnitRank $unit_rank ,Unit $unit,FinancialYear $fy , IndicatorGroup $indicator_group ,Request $request ){

        $indicators = Indicator::where('indicator_group_id',$indicator_group->id )->get();

        if ($request->has('search')) {

            $template_indicators = TemplateIndicator::where('name', 'like', "%{$request->search}%")

            ->where('indicator_group_id',$indicator_group->id )

            ->get();

        }


        return view('admin.pmmu.index',compact('unit_rank','unit','indicator_group','fy','indicators'));

    }

}
