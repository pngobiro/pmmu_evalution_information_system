<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


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





}
