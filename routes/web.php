<?php

use App\Http\Controllers\Backend\ChangePassword;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\UnitRankController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\FinancialYearController;
use App\Http\Controllers\Backend\IndicatorGroupController;
use App\Http\Controllers\Backend\IndicatorController;
use App\Http\Controllers\Backend\TemplatesController;
use App\Http\Controllers\Backend\IndicatorCategoryController;
use App\Http\Controllers\Backend\TemplateIndicatorsController;
use App\Http\Controllers\Backend\TemplateIndicatorGroupController;
use App\Http\Controllers\Backend\MasterIndicatorController;
use App\Http\Controllers\Backend\PmmuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\RankCategoryController;
use App\Http\Controllers\Sshserver;




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');



Auth::routes();



    Route::resource('template-groups',TemplateIndicatorGroupController::class);
    Route::resource('template-indicators',TemplateIndicatorsController::class);
    Route::get('admin-dashboard', [AdminHomeController::class, 'index'])->name('admin-dashboard');
    Route::get('templates', [TemplatesController::class, 'index'])->name('templates');
    Route::resource('unit-ranks.fy',TemplatesController::class);
    Route::resource('unit-ranks.fy.rank_category.template-groups',TemplateIndicatorGroupController::class);
    Route::resource('unit-ranks.fy.template-groups.template-indicators',TemplateIndicatorsController::class);
    Route::resource('master-indicator',MasterIndicatorController::class);
    Route::resource('unit-ranks.master-indicator',MasterIndicatorController::class);
    Route::post('update-permissions', [UserController::class, 'permisionUpdate'])->name('update-permissions');


    // Sshserver index page
    Route::get('sshserver', [Sshserver::class, 'index'])->name('sshserver');

    // Sshserver post page
    Route::post('sshserver', [Sshserver::class, 'changePasswordViaSSH'])->name('change_password_ssh');

    // Sshserver goodbye page
    Route::get('sshserver/goodbye', [Sshserver::class, 'goodbye'])->name('sshserver.goodbye');



    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('reports/excel_reports', [ReportsController::class, 'masterExcelReports'])->name('excel_reports');
    Route::get('file-export', [ReportsController::class, 'fileExport'])->name('file-export');
    Route::get('reports/test_reports', [ReportsController::class, 'test_report'])->name('test_report');
    Route::resource('users', UserController::class);
    Route::resource('indicators', IndicatorController::class);
    Route::resource('unit-ranks', UnitRankController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('fy', FinancialYearController::class);
    Route::resource('indicator-groups', IndicatorGroupController::class);
    Route::resource('unit-ranks.units',UnitController::class);

    // a post to hasPMMU in the UnitController
    Route::post('update-has-pmmu-division/{unit_id}', [UnitController::class, 'updateHasPMMU'])->name('update-has-pmmu-division');

    // a post to update_remarks in Indicator Controller
    Route::post('update-indicator-remarks/{indicator_id}', [IndicatorController::class, 'updateIndicatorRemarks'])->name('update-indicator-remarks');



    //Route::resource('unit-ranks.units.fy',UnitController::class);
    Route::resource('unit-ranks.units.fy', FinancialYearController::class)->shallow();
    Route::resource('unit-ranks.fy.rank_category', RankCategoryController::class);

    
    Route::get('unit-ranks/{unit_rank}/fy/{fy}/unit_excel',[ReportsController::class,"unit_excel"])->name('unit_excel');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/division/{division}/fy/{fy}/indicator-groups/simple_pmmu',[ReportsController::class,"createSimplePmmuPDF"])->name('simple_pmmu');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/division/{division}/fy/{fy}/indicator-groups/complex_pmmu',[ReportsController::class,"createComplexPmmuPDF"])->name('complex_pmmu');


    Route::get('unit-ranks/{unit_rank}/units/{unit}/division/{division}/fy/{fy}/indicator-groups/pmmu',[IndicatorController::class,"preview"])->name('pmmu');



    Route::get('unit-ranks/{unit_rank}/units/{unit}/division/{division}/fy/{fy}/indicator-groups/pdf',[IndicatorController::class,"createPDF"])->name('pdf');

    Route::get('unit-ranks/{unit_rank}/units/{unit}/division/{division}/fy/{fy}/indicator-groups/download_template',[PmmuController::class,"download_template"])->name('download_template');


    Route::get('unit-ranks/{unit_rank}/fy/{fy}/rank_categories/{rank_category}/download_previous_fy_template',[PmmuController::class,"download_previous_fy_template"])->name('download_previous_fy_template');

    Route::get('unit-ranks/{unit_rank}/units/{unit}/division/{division}/fy/{fy}/indicator-groups/update_targets',[IndicatorController::class,"update_targets"])->name('update_targets');

    Route::resource('unit-ranks.units.divisions.fy.indicator-groups',IndicatorController::class);

    Route::resource('unit-ranks.units.divisions.fy.indicator-groups.indicators',PmmuController::class);

    //  user routes
    Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');
    Route::get('users/{user}/change-password', [ChangePasswordController::class, 'change_password_form'])->name('user_change_password_form');





  






