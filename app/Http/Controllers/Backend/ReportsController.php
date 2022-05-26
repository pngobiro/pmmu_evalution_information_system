<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\Division;
use App\Models\FinancialYear;
use App\Models\IndicatorGroup;
use App\Models\MasterIndicator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use PDF;
use App\Lib\IndicatorGraderHelper;
use Excel;

class ReportsController extends Controller
{
        public function index()
        {
        
            return view('admin.reports.index');
        }

        public function masterExcelReports(){
            
            return view('admin.reports.excel_reports');

        }
        
        
        public function createSimplePmmuPDF(Request $request,UnitRank $unit_rank ,Unit $unit ,Division $division,FinancialYear $fy) {

            $indicatorgroups = IndicatorGroup::withSum('indicators as total_indicators', 'indicator_weight')
            ->where('unit_id',$unit->id)
            ->where('financial_year_id',$fy->id)
            ->where('division_id',$division->id)
            ->get(); 

        
        $overall_composite_score = 0;
        foreach ($indicatorgroups as $indicatorgroup) {
            foreach ($indicatorgroup->indicators as $indicator) {
                $overall_composite_score+= $indicator->indicator_weighted_score;
            }
        }

        $performance = new  IndicatorGraderHelper();

        $overallScoreGrade  = $performance-> getCompositeScore($overall_composite_score);

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
        // show page numbers on each page
        PDF::SetPrintHeader(false);
        PDF::SetPrintFooter(false);
        // orientation landscape 
        PDF::AddPage('L', 'A4');
        PDF::writeHTML($this->getSimplePmmuPDF($indicatorgroups,$unit_rank,$fy,$unit,$overallScoreGrade,$overall_composite_score), true, false, true, false, '');

        //create pdf from unit name and financial year
        $pdf = PDF::Output('PMMU_'.$unit->name.'FY'.$fy->name.'.pdf');
        return $pdf;
        exit;
    }


    public function createComplexPmmuPDF(Request $request,UnitRank $unit_rank ,Unit $unit ,Division $division,FinancialYear $fy) {
      
        $indicatorgroups = IndicatorGroup::withSum('indicators as total_indicators', 'indicator_weight')
        ->where('unit_id',$unit->id)
        ->where('financial_year_id',$fy->id)
        ->where('division_id',$division->id)
        ->get(); 

        $composite_score = 0;
        foreach ($indicatorgroups as $indicatorgroup) {
            foreach ($indicatorgroup->indicators as $indicator) {
                $composite_score += $indicator->indicator_weighted_score;
            }
        }


        $performance = new  IndicatorGraderHelper();
        $overallScoreGrade  = $performance-> getCompositeScore($composite_score);
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
        // show page numbers on each page
        PDF::SetPrintHeader(false);
        PDF::SetPrintFooter(false);
        // orientation landscape 
        PDF::AddPage('L', 'A4');

        // write html to pdf
        
        PDF::writeHTML($this->getComplexPmmuPDF($indicatorgroups,$unit_rank,$fy,$unit,$overallScoreGrade,$composite_score), true, false, true, false, '');
        //create pdf from unit name and financial year
        $pdf = PDF::Output('PMMU_'.$unit->name.'FY'.$fy->name.'.pdf');
        return $pdf;
        exit;
    }


    private function getSimplePmmuPDF($indicatorgroups,$unit_rank,$fy,$unit,$overallScoreGrade,$composite_score ){

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
        .sub-header-1{
            font-size: 8px;
            text-align: center;
            font-weight: bold;
        } 
        .sub-header-2{
            font-size: 8px;
            text-align: center;
            font-style: italic;
        }
        
        .outstanding {
        background-color: #90EE90;
        color:#000;
        padding:2px;
        text-align: center;
    }
        .excellent{
            background-color:#87CEFA;
            color:#000;
            padding:2px;
            text-align: center;
        }
        .verygood{
            background-color:#9370DB;
            color:#000;
            padding:2px;    text-align: center;
        }
        .good{
            background-color:#20B2AA;
            color:#000;
            
            padding:2px;    text-align: center;
        }
        .fair{
            background-color:#FFD700;
            color:#000;
            padding:2px;    text-align: center;
        }
        .poor{
            background-color:#FFA07A;
            color:#000;
            padding:2px;    text-align: center;
        }
    
        </style>
       
        </head>
        <body>

        <div class="header">'.config('app.name').'</div>
        <div class="header">'.strtoupper($unit->name).'</div>
        <div class="sub-header">PERFORMANCE FOR THE FINANCIAL YEAR '.$fy->name.'</div>
        <br>
        <div class="sub-header-2">Generated on: '.date('d-m-Y  H:i:s', strtotime('+3 hours')).'</div>
    
        </body>
        </html>';
      
        foreach ($indicatorgroups as $group){
                $html .= '<h1>'.strtoupper($group->name).'</h1>';
                $html .= '<table>';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="width: 20px">#</th>';
                $html .= '<th style="width: 360px">Indicator</th>';
                $html .= '<th style="width: 50px">Indicator Type</th>';
                $html .= '<th  style="width: 60px" >Unit of Measure</th>';
                $html .= '<th style="width: 40px">Weight</th>';
                $html .= '<th style="width: 40px">Target</th>';
                $html .= '<th style="width: 70px" >Achievement</th>';
                $html .= '<th style="width: 70px" >Percentage Performance</th>';
                $html .= '<th style="width: 70px" >Performance Grade</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                
                foreach ($group->indicators as $indicator){
       
                // indicators table
                $html .= '<tr>';
                $html .= '<td style="width: 20px">'.$indicator->order.'</td>';
                $html .= '<td  style="width: 360px">'.$indicator->name.'</td>';
                $html .= '<td style="width: 50px">'.$indicator->type->name.'</td>';
                $html .= '<td  style="width: 60px" >'.$indicator->measure->name.'</td>';
                $html .= '<td style="width: 40px">'.$indicator->indicator_weight.'</td>';
                $html .= '<td style="width: 40px" >'.$indicator->indicator_target.'</td>';
                $html .= '<td style="width: 70px" >'.$indicator->indicator_achivement.'</td>';
                $html .= '<td style="width: 70px" >'.round($indicator->indicator_performance_score).'</td>';
                $html .= '<td style="width: 70px" >'.$indicator->indicator_graded_score.'</td>';
                $html .= '</tr>';
                }
                $html .= '<tr>';
                $html .= '<td colspan="3" style="text-align: center; font-weight: bold;"> Group Total Weights</td>';
                $html .= '<td colspan="9" style="text-align: center; font-weight: bold;"> Group Composite scores</td>';                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '<br>';
            }
            
                $html .= '<div style="page-break-after: always;"></div>';
                $html .= '<h1> OVERALL PERFORMANCE BASED ON WEIGHTS OF INDICATORS </h1>';
                $html .=  '<table >';
                $html .=  '<thead>';
                $html .=    '<tr>';
                $html .=    '<th><h3> Overall Composite Score   </h3> </th>';
                $html .=    '<th><h3> Overall Performance Score </h3> </th>';
                $html .=    '<th><h3> Overall Performance Grade </h3> </th>';
                $html .=    '</tr>';
                $html .=    '</thead>';
                $html .=    ' <tbody>';
                $html .=    '<tr>';
                $html .=    '<td> <h3>'.round($composite_score,3).'</h3></td>';
                $html .=  '<td> <h3>'.$overallScoreGrade['score'].'%</h3> </td>';
                $html .=  '<td> <h3>'.$overallScoreGrade['grade'].'</h3> </td>';
                $html .=  '</tr>';
                $html .=  '</tbody>';
                $html .=  '</table>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .=  '<table class="table" id="rowspans">';
                $html .=  '<tbody><tr> <td> <b>KEY: Performance per Indicator (Normal &amp; Declining Indicators)</b></td>';
                $html .=  '<td> <p class="outstanding" id="rowspans"><b>Outstanding </b><br> percentage greater than 120%</p></td> ';
                $html .=  '<td><p class="excellent" id="rowspans"><b>Excellent</b> <br> percentage between 101%  and 119%</p> </td> ';
                $html .=  '<td>  <p class="verygood" id="rowspans"><b>Very Good </b><br> percentage = 100% </p></td> ';
                $html .=  '<td>  <p class="good" id="rowspans"><b>Good  </b><br> percentage between 75% and 99%</p></td> ';
                $html .=  '<td> <p class="fair" id="rowspans"><b>Fair</b> <br> percentage between 50% and 74%</p></td> <td> ';
                $html .=  '<p class="poor" id="rowspans"><b>Poor </b><br> percentage below 50%</p></td></tr> ';
                $html .=  '</tbody></table>';
                $html .=  '<table class="table" id="rowspans">';
                $html .=  '<tbody><tr> <td> <b>KEY: Performance per Indicator (Special Indicators)</b></td>';
                $html .=  '<td> <p class="outstanding" id="rowspans"><b>Outstanding </b><br> percentage equal to 100%</p></td> ';
                $html .=  '<td><p class="excellent" id="rowspans"><b>Excellent</b> <br> percentage between 79%  and 99%</p> </td> ';
                $html .=  '<td>  <p class="verygood" id="rowspans"><b>Very Good </b><br> percentage between 69%  and 78% </p></td> ';
                $html .=  '<td>  <p class="good" id="rowspans"><b>Good  </b><br> percentage between 59% and 68%</p></td> ';
                $html .=  '<td> <p class="fair" id="rowspans"><b>Fair</b> <br> percentage between 49% and 58%</p></td> <td>';
                $html .=  '<p class="poor" id="rowspans"><b>Poor </b><br> percentage between 0% and 48%</p></td></tr> ';
                $html .=  '</tbody></table>';
                $html .=  '<table class="table" id="rowspans">';
                $html .=  '<tbody><tr> <td> <b>KEY: Overall Performance Based on Weights of Indicators (composite score)</b></td>';
                $html .=  '<td> <p class="outstanding" id="rowspans"><b>Outstanding </b><br>Composite Score of between 1.00 and 2.00</p></td> ';
                $html .=  '<td><p class="excellent" id="rowspans"><b>Excellent</b> <br> Composite Score of between 2.01 and 2.60</p> </td> ';
                $html .=  '<td>  <p class="verygood" id="rowspans"><b>Very Good </b><br> Composite Score of between 2.61 and 3.20 </p></td> ';
                $html .=  '<td>  <p class="good" id="rowspans"><b>Good  </b><br> Composite Score of between 3.21 and 3.60</p></td> ';
                $html .=  '<td> <p class="fair" id="rowspans"><b>Fair</b> <br> Composite Score of between 3.61 and 4.00</p></td> <td> ';
                $html .=  '<p class="poor" id="rowspans"><b>Poor </b><br> Composite Score of between 4.01 and 5.00</p></td></tr> ';
                $html .=  '</tbody></table>';
                
                return $html;

      }
      
      
      private function getComplexPmmuPDF($indicatorgroups,$unit_rank,$fy,$unit,$overallScoreGrade,$composite_score){
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
        .sub-header-1{
            font-size: 8px;
            text-align: center;
            font-weight: bold;
        } 
        .sub-header-2{
            font-size: 8px;
            text-align: center;
            font-style: italic;
        }
        
        .outstanding {
        background-color: #90EE90;
        color:#000;
        padding:2px;
        text-align: center;
    }
        .excellent{
            background-color:#87CEFA;
            color:#000;
            padding:2px;
            text-align: center;
        }
        .verygood{
            background-color:#9370DB;
            color:#000;
            padding:2px;    text-align: center;
        }
        .good{
            background-color:#20B2AA;
            color:#000;
            
            padding:2px;    text-align: center;
        }
        .fair{
            background-color:#FFD700;
            color:#000;
            padding:2px;    text-align: center;
        }
        .poor{
            background-color:#FFA07A;
            color:#000;
            padding:2px;    text-align: center;
        }
        table.GeneratedTable {
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border-width: 2px;
            border-color: #deddda;
            border-style: solid;
            color: #000000;
          }
          
        </style>
       
        </head>
        <body>
        <div class="header">PERFORMANCE MANAGEMENT AND MEASUREMENT ANALYSIS</div>
     
        <div class="header">'.strtoupper($unit->name).'</div>
        <div class="sub-header">PERFORMANCE FOR THE FINANCIAL YEAR '.$fy->name.'</div>
        <br>
        <div class="sub-header-2">Generated on: '.date('d-m-Y  H:i:s', strtotime('+3 hours')).'</div>
    
        </body>
        </html>';
        
        foreach ($indicatorgroups as $group){
                $html .= '<h1>'.strtoupper($group->name).'</h1>';
                $html .= '<table>';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="width: 20px">#</th>';
                $html .= '<th style="width: 300px">Indicator</th>';
                $html .= '<th style="width: 50px">Indicator Type</th>';
                $html .= '<th  style="width: 60px" >Unit of Measure</th>';
                $html .= '<th style="width: 40px">Weight</th>';
                $html .= '<th style="width: 40px">Target</th>';
                $html .= '<th style="width: 70px" >Achievement</th>';
                $html .= '<th style="width: 40px">Raw Score</th>';
                $html .= '<th style="width: 40px">Weighted Score</th>';
                $html .= '<th style="width: 70px" >Percentage Performance</th>';
                $html .= '<th style="width: 60px" >Performance Grade</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

            foreach ($group->indicators as $indicator){
       
                // indicators table
                $html .= '<tr>';
                $html .= '<td style="width: 20px">'.$indicator->order.'</td>';
                $html .= '<td  style="width: 300px">'.$indicator->name.'</td>';
                $html .= '<td style="width: 50px">'.$indicator->type->name.'</td>';
                $html .= '<td  style="width: 60px" >'.$indicator->measure->name.'</td>';
                $html .= '<td style="width: 40px">'.$indicator->indicator_weight.'</td>';
                $html .= '<td style="width: 40px" >'.$indicator->indicator_target.'</td>';
                $html .= '<td style="width: 70px" >'.$indicator->indicator_achivement.'</td>';
                $html .= '<td style="width: 40px" >'.round($indicator->indicator_raw_score,1).'</td>';
                $html .= '<td style="width: 40px" >'.round($indicator->indicator_weighted_score,2).'</td>';
                $html .= '<td style="width: 70px" >'.round($indicator->indicator_performance_score).'</td>';
                $html .= '<td style="width: 60px" >'.$indicator->indicator_graded_score.'</td>';
                $html .= '</tr>';

                }

                $html .= '<tr>';
                $html .= '<td colspan="3" style="text-align: center; font-weight: bold;"> Group Total Weights</td>';
                $html .= '<td colspan="9" style="text-align: center; font-weight: bold;"> Group Composite scores</td>';

                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '<br>';
            
            }
    
                $html .= '<div style="page-break-after: always;"></div>';
                $html .= '<h1> OVERALL PERFORMANCE BASED ON WEIGHTS OF INDICATORS </h1>';
                $html .=  '<table >';
                $html .=  '<thead>';
                $html .=    '<tr>';
                $html .=    '<th><h3> Overall Composite Score   </h3> </th>';
                $html .=    '<th><h3> Overall Performance Score </h3> </th>';
                $html .=    '<th><h3> Overall Performance Grade </h3> </th>';
                $html .=    '</tr>';
                $html .=    '</thead>';
                $html .=    ' <tbody>';
                $html .=    '<tr>';
                $html .=    '<td> <h3>'.round($composite_score,3).'</h3></td>';
                $html .=  '<td> <h3>'.$overallScoreGrade['score'].'%</h3> </td>';
                $html .=  '<td> <h3>'.$overallScoreGrade['grade'].'</h3> </td>';
                $html .=  '</tr>';
                $html .=  '</tbody>';
                $html .=  '</table>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .=  '<table class="table" id="rowspans">';
                $html .=  '<tbody><tr> <td> <b>KEY: Performance per Indicator (Normal &amp; Declining Indicators)</b></td>';
                $html .=  '<td> <p class="outstanding" id="rowspans"><b>Outstanding </b><br> percentage greater than 120%</p></td> ';
                $html .=  '<td><p class="excellent" id="rowspans"><b>Excellent</b> <br> percentage between 101%  and 119%</p> </td> ';
                $html .=  '<td>  <p class="verygood" id="rowspans"><b>Very Good </b><br> percentage = 100% </p></td> ';
                $html .=  '<td>  <p class="good" id="rowspans"><b>Good  </b><br> percentage between 75% and 99%</p></td> ';
                $html .=  '<td> <p class="fair" id="rowspans"><b>Fair</b> <br> percentage between 50% and 74%</p></td> <td> ';
                $html .=  '<p class="poor" id="rowspans"><b>Poor </b><br> percentage below 50%</p></td></tr> ';
                $html .=  '</tbody></table>';
                $html .=  '<table class="table" id="rowspans">';
                $html .=  '<tbody><tr> <td> <b>KEY: Performance per Indicator (Special Indicators)</b></td>';
                $html .=  '<td> <p class="outstanding" id="rowspans"><b>Outstanding </b><br> percentage equal to 100%</p></td> ';
                $html .=  '<td><p class="excellent" id="rowspans"><b>Excellent</b> <br> percentage between 79%  and 99%</p> </td> ';
                $html .=  '<td>  <p class="verygood" id="rowspans"><b>Very Good </b><br> percentage between 69%  and 78% </p></td> ';
                $html .=  '<td>  <p class="good" id="rowspans"><b>Good  </b><br> percentage between 59% and 68%</p></td> ';
                $html .=  '<td> <p class="fair" id="rowspans"><b>Fair</b> <br> percentage between 49% and 58%</p></td> <td>';
                $html .=  '<p class="poor" id="rowspans"><b>Poor </b><br> percentage between 0% and 48%</p></td></tr> ';
                $html .=  '</tbody></table>';
                $html .=  '<table class="table" id="rowspans">';
                $html .=  '<tbody><tr> <td> <b>KEY: Overall Performance Based on Weights of Indicators (composite score)</b></td>';
                $html .=  '<td> <p class="outstanding" id="rowspans"><b>Outstanding </b><br>Composite Score of between 1.00 and 2.00</p></td> ';
                $html .=  '<td><p class="excellent" id="rowspans"><b>Excellent</b> <br> Composite Score of between 2.01 and 2.60</p> </td> ';
                $html .=  '<td>  <p class="verygood" id="rowspans"><b>Very Good </b><br> Composite Score of between 2.61 and 3.20 </p></td> ';
                $html .=  '<td>  <p class="good" id="rowspans"><b>Good  </b><br> Composite Score of between 3.21 and 3.60</p></td> ';
                $html .=  '<td> <p class="fair" id="rowspans"><b>Fair</b> <br> Composite Score of between 3.61 and 4.00</p></td> <td> ';
                $html .=  '<p class="poor" id="rowspans"><b>Poor </b><br> Composite Score of between 4.01 and 5.00</p></td></tr> ';
                $html .=  '</tbody></table>';
                
                return $html;
      }


 

    
   
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'Magistrate Court FY 2021-22.xlsx');
    }
    
    public function unit_excel(UnitRank $unit_rank , FinancialYear $fy){
        $file_name = "{$unit_rank->name} - FY {$fy->name} .xlsx";
        return Excel::download(new UsersExport($unit_rank->id,$fy->id),str_replace("/","-",$file_name) );
    }
}





