<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\UpdateIndicatorRequest;
use App\Http\Controllers\Controller;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;
use App\Models\IndicatorGroup;
use App\Models\Indicator;
use App\Models\TemplateIndicatorGroup;
use Illuminate\Http\Request;
use PDF;
use App\Lib\IndicatorGraderHelper;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy )
    {
        $indicatorgroups = IndicatorGroup::withSum('indicators as total_indicators', 'indicator_weight')
                                            ->where('unit_id',$unit->id)
                                            ->where('financial_year_id',$fy->id)
                                            ->get(); 
        if ($request->has('search')) {
            $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id)
            ->where('financial_year_id',$fy->id)
            ->where('name', 'like', "%{$request->search}%")
            ->get();
        }
        return view('admin.indicators.index',compact('indicatorgroups','unit_rank','fy','unit')) ;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy)
    {


        return view('admin.indicators.create',compact('unit_rank','fy','unit')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy)
    {
        IndicatorGroup::create([
            'name' =>               $request->name,
            'description' =>        $request->description,
            'order' =>              $request->order,
            'unit_rank_id' =>       $unit_rank->id,
            'unit_id'     =>        $unit->id,
            'financial_year_id' =>  $fy->id,
        ]);
        return redirect()->route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id ,$unit->id,$fy->id])->with('message', 'Group Registered Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitRank $unit_rank,Unit $unit ,FinancialYear $fy,IndicatorGroup $indicator_group)
    {



        return view('admin.indicators.edit',compact('unit_rank','unit','fy','indicator_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRank $unit_rank,Unit $unit,FinancialYear $fy,IndicatorGroup $indicator_group,Indicator $indicator ,UpdateIndicatorRequest $request )
    {
        $indicator->update($request->validated());

        return redirect()->route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id, $unit->id, $fy->id])->with('message', 'Group Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function preview(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy){
        $indicatorgroups = IndicatorGroup::with('indicators')
                                            ->withSum('indicators as total_indicators', 'indicator_weight')
                                            ->where('unit_id',$unit->id)
                                            ->where('financial_year_id',$fy->id)
                                            ->get()
                                            ->sortBy('indicators.indicator_order');


           // sum of $indicatorgroups total_weighted 
              $total_indicator_weighted_score = 0;
                foreach ($indicatorgroups as $indicatorgroup) {
                    foreach ($indicatorgroup->indicators as $indicator) {
                        $total_indicator_weighted_score += $indicator->indicator_weighted_score;
                    }
                }
      
        
        $performance = new  IndicatorGraderHelper();
       $overallScoreGrade  = $performance-> getCompositeScore($total_indicator_weighted_score);
        

        
                                            
        return view('admin.indicators.preview',compact('indicatorgroups','unit_rank','fy','unit','total_indicator_weighted_score','overallScoreGrade'));

    }

  

    public function createSimplePmmuPDF(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy) {
       
        $indicatorgroups = IndicatorGroup::withSum('indicators as total_indicators', 'indicator_weight')
        ->where('unit_id',$unit->id)
        ->where('financial_year_id',$fy->id)
        ->get(); 



        PDF::SetAuthor('TCPDF');
        PDF::SetTitle('Performance Management & Measurement Understanding Analysis');
        PDF::SetSubject('Performance Management & Measurement Understanding Analysis');
        PDF::SetKeywords('Performance Management & Measurement Understanding Analysis');
        PDF::SetHeaderData('', '', 'Performance Management & Measurement Understanding Analysis', '');
        PDF::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        PDF::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(PDF_MARGIN_HEADER);
        PDF::SetFooterMargin(PDF_MARGIN_FOOTER);
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        PDF::SetFont('helvetica', '', 10);
        // orientation landscape 
        PDF::AddPage('L', 'A4');
        PDF::writeHTML($this->getPmmuPDF($indicatorgroups,$unit_rank,$fy,$unit), true, false, true, false, '');

        //create pdf from unit name and financial year
        $pdf = PDF::Output('PMMU_'.$unit->name.'_'.$fy->name.'.pdf');
        return $pdf;
        exit;



    }


      
      public function createComplexPmmuPDF(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy) {
      
  
        $indicatorgroups = IndicatorGroup::withSum('indicators as total_indicators', 'indicator_weight')
        ->where('unit_id',$unit->id)
        ->where('financial_year_id',$fy->id)
        ->get(); 


        $pdf = \App::make('dompdf.wrapper');
      
        $pdf = PDF::loadView('admin.pmmu.complex_pmmu' , compact($data = ['indicatorgroups','unit','fy']));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download("{$unit->name} - FY {$fy->name} Detailed PMMU Scoresheet");




    }


    public function download_template(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy ){
        $template_group = TemplateIndicatorGroup::where('unit_rank_id',$unit_rank->id)
        ->where('financial_year_id',$fy->id)->get();
        $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id)
        ->where('financial_year_id',$fy->id)->get();
     if (!$template_group->isEmpty() &&    ($indicatorgroups->isEmpty())){
        foreach ($template_group as $group ){
                $new_group                     = new IndicatorGroup();
                $new_group->name               = $group->name;
                $new_group->description        = $group->description;
                $new_group->order              = $group->order;
                $new_group->unit_rank_id       = $unit_rank->id;
                $new_group->unit_id            = $unit->id;
                $new_group->financial_year_id  = $fy->id;
            $new_group->save(); 
            foreach ($group->template_indicators as $indicator){
                    $new_indicator                                  = new Indicator();
                    $new_indicator->indicator_group_id              = $new_group->id;
                    $new_indicator->master_indicator_id             = $indicator->master_indicator_id ;
                    $new_indicator->order                           = $indicator->order;
                    $new_indicator->name                            = $indicator->name;
                    $new_indicator->indicator_type_id               = $indicator->indicator_type_id;
                    $new_indicator->indicator_weight                = $indicator->indicator_weight;
                    $new_indicator->indicator_unit_of_measure_id    = $indicator->indicator_unit_of_measure_id;
                    $new_indicator->order                           = $indicator->order;
            $new_group->indicators()->save($new_indicator);

            };
        };
        };
    
        return redirect()->route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id ,$unit->id,$fy->id])->with('message', 'Template Created Succesfully');

      }

      public function update_targets(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy){
        $indicatorgroups = IndicatorGroup::withSum('indicators as total_indicators', 'indicator_weight')
                                            ->where('unit_id',$unit->id)
                                            ->where('financial_year_id',$fy->id)
                                            ->get(); 
        return view('admin.indicators.update_targets',compact('indicatorgroups','unit_rank','fy','unit')) ;
      }

      private function getPmmuPDF($indicatorgroups,$unit_rank,$fy,$unit){
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Performance Management & Measurement Understanding Analysis</title>
        <style>
        body{
            font-family: sans-serif;
            font-size: 10px;}
        table{
            border-collapse: collapse;
            width: 100%;}
        th{
            background-color: #ccc;
            text-align: left;
            padding: 5px;
            border: 1px solid #ccc;}
        td{
            padding: 5px;
            border: 1px solid #ccc;}

        .header{
            font-size: 14px;
            text-align: center;
            font-weight: bold;
        }
        .sub-header{
            font-size: 12px;
            text-align: center;
            font-weight: bold;}
        }

        </style>

       
        </head>
        <body>
        <div class="header">Performance Management & Measurement Understanding Analysis</div>
        <div class="sub-header">Unit: '.$unit->name.'</div>
        <div class="sub-header">FY: '.$fy->name.'</div>

        </body>

        </html>';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>Indicator Group</th>';

        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($indicatorgroups as $group){
            $html .= '<tr>';
            $html .= '<td>'.$group->name.'</td>';
            
            foreach ($group->indicators as $indicator){
                // create a new html table row per indicator
                $html .= '<table>';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th>Indicator</th>';
                $html .= '<th>Target</th>';
                $html .= '<th>Actual</th>';
                $html .= '<th>%</th>';
                $html .= '</tr>';
           
                $html .= '</thead>';
                $html .= '<tbody>';
                $html .= '<tr>';
                $html .= '<td>'.$indicator->name.'</td>';
                $html .= '<td>'.$indicator->indicator_weight.'</td>';
                $html .= '<td>'.$indicator.'</td>';
                $html .= '<td>'.$indicator->target.'</td>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table>';
                



            }

            $html .= '</tr>';

        }

        $html .= '</tbody>';

        $html .= '</table>';

       


    return $html;

    }
}    

git push 