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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin-dashboard', [AdminHomeController::class, 'index'])->name('admin-dashboard');

Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('templates', [TemplatesController::class, 'index'])->name('templates');

Route::get('reports', [ReportsController::class, 'index'])->name('reports');

Route::resource('users', UserController::class);

Route::resource('unit-ranks', UnitRankController::class);

Route::resource('unit', UnitController::class);

Route::resource('fy', FinancialYearController::class);

Route::resource('indicator-groups', IndicatorGroupController::class);

Route::resource('indicators', IndicatorController::class);

Route::resource('unit-ranks.units',UnitController::class);

Route::resource('unit-ranks.fy',TemplatesController::class);




Route::resource('unit-ranks.fy.indicator-groups.indicators',TemplateIndicatorsController::class);

Route::resource('unit-ranks.fy.indicator-groups',TemplatesController::class);

//Route::resource('unit-ranks.fy.indicator-groups.indicators',TemplatesController::class);




Route::resource('unit-ranks.units.fy.indicator-groups.indicators',IndicatorController::class);

Route::resource('unit-ranks.indicator-categories',IndicatorCategoryController::class);

//Route::resource('unit-ranks.units.fy.indicator-groups', IndicatorGroupController::class);


Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');


