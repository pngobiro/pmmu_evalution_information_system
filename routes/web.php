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






    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('reports/excel_reports', [ReportsController::class, 'excel_reports'])->name('excel_reports');
    Route::get('file-export', [ReportsController::class, 'fileExport'])->name('file-export');
    Route::get('reports/test_reports', [ReportsController::class, 'test_report'])->name('test_report');
    Route::resource('users', UserController::class);
    Route::resource('indicators', IndicatorController::class);
    Route::resource('unit-ranks', UnitRankController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('fy', FinancialYearController::class);
    Route::resource('indicator-groups', IndicatorGroupController::class);
    Route::resource('unit-ranks.units',UnitController::class);
    //Route::resource('unit-ranks.units.fy',UnitController::class);
    Route::resource('unit-ranks.units.fy', FinancialYearController::class)->shallow();
    Route::resource('unit-ranks.fy.rank_category', RankCategoryController::class);
    Route::get('unit-ranks/{unit_rank}/fy/{fy}/unit_excel',[ReportsController::class,"unit_excel"])->name('unit_excel');
    //Route::resource('unit-ranks.units.fy.indicator-groups', IndicatorGroupController::class);
    Route::get('unit-ranks/{unit_rank}/units/{unit}/fy/{fy}/indicator-groups/simple_pmmu',[IndicatorController::class,"createSimplePmmuPDF"])->name('simple_pmmu');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/fy/{fy}/indicator-groups/complex_pmmu',[IndicatorController::class,"createComplexPmmuPDF"])->name('complex_pmmu');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/fy/{fy}/indicator-groups/pmmu',[IndicatorController::class,"preview"])->name('pmmu');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/fy/{fy}/indicator-groups/pdf',[IndicatorController::class,"createPDF"])->name('pdf');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/fy/{fy}/indicator-groups/download_template',[IndicatorController::class,"download_template"])->name('download_template');
    Route::get('unit-ranks/{unit_rank}/units/{unit}/fy/{fy}/indicator-groups/update_targets',[IndicatorController::class,"update_targets"])->name('update_targets');
    Route::resource('unit-ranks.units.fy.indicator-groups',IndicatorController::class);
    Route::resource('unit-ranks.units.fy.indicator-groups.indicators',PmmuController::class);

    //  user routes
    Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');
    Route::get('users/{user}/change-password', [ChangePasswordController::class, 'change_password_form'])->name('user_change_password_form');
    Route::get('users/{user}/permissions', [UserController::class, 'permissions_form'])->name('user.permissions');
    Route::post('users/{user}/permissions', [UserController::class, 'permissions_update'])->name('user.permissions.update');
    Route::get('users/{user}/permissions/create', [UserController::class, 'permissions_create'])->name('user.permissions.create');
    Route::post('users/{user}/permissions/create', [UserController::class, 'permissions_store'])->name('user.permissions.store');
    Route::get('users/{user}/permissions/{permission}/edit', [UserController::class, 'permissions_edit'])->name('user.permissions.edit');
    Route::put('users/{user}/permissions/{permission}/edit', [UserController::class, 'permissions_update'])->name('user.permissions.update');
    Route::delete('users/{user}/permissions/{permission}/delete', [UserController::class, 'permissions_destroy'])->name('user.permissions.destroy');

    // user roles
    Route::get('users/{user}/roles', [UserController::class, 'roles_form'])->name('user.roles');
    Route::post('users/{user}/roles', [UserController::class, 'roles_update'])->name('user.roles.update');
    Route::get('users/{user}/roles/create', [UserController::class, 'roles_create'])->name('user.roles.create');
    Route::post('users/{user}/roles/create', [UserController::class, 'roles_store'])->name('user.roles.store');
    Route::get('users/{user}/roles/{role}/edit', [UserController::class, 'roles_edit'])->name('user.roles.edit');
    Route::put('users/{user}/roles/{role}/edit', [UserController::class, 'roles_update'])->name('user.roles.update');
    Route::delete('users/{user}/roles/{role}/delete', [UserController::class, 'roles_destroy'])->name('user.roles.destroy');

    // user activate and deactivate with ajax route
    Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::post('users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

    // user profile
    Route::get('users/{user}/profile', [UserController::class, 'profile_form'])->name('user.profile');
    Route::post('users/{user}/profile', [UserController::class, 'profile_update'])->name('user.profile.update');
    Route::get('users/{user}/profile/create', [UserController::class, 'profile_create'])->name('user.profile.create');
    Route::post('users/{user}/profile/create', [UserController::class, 'profile_store'])->name('user.profile.store');
    Route::get('users/{user}/profile/{profile}/edit', [UserController::class, 'profile_edit'])->name('user.profile.edit');
    Route::put('users/{user}/profile/{profile}/edit', [UserController::class, 'profile_update'])->name('user.profile.update');
    Route::delete('users/{user}/profile/{profile}/delete', [UserController::class, 'profile_destroy'])->name('user.profile.destroy');

    // admin routes
    Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users/create', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}/edit', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}/delete', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/users/{user}/permissions', [AdminController::class, 'permissions_form'])->name('admin.user.permissions');
    Route::post('admin/users/{user}/permissions', [AdminController::class, 'permissions_update'])->name('admin.user.permissions.update');
    Route::get('admin/users/{user}/permissions/create', [AdminController::class, 'permissions_create'])->name('admin.user.permissions.create');
    Route::post('admin/users/{user}/permissions/create', [AdminController::class, 'permissions_store'])->name('admin.user.permissions.store');
    Route::get('admin/users/{user}/permissions/{permission}/edit', [AdminController::class, 'permissions_edit'])->name('admin.user.permissions.edit');
    Route::put('admin/users/{user}/permissions/{permission}/edit', [AdminController::class, 'permissions_update'])->name('admin.user.permissions.update');
    Route::delete('admin/users/{user}/permissions/{permission}/delete', [AdminController::class, 'permissions_destroy'])->name('admin.user.permissions.destroy');
    Route::get('admin/users/{user}/roles', [AdminController::class, 'roles_form'])->name('admin.user.roles');
    Route::post('admin/users/{user}/roles', [AdminController::class, 'roles_update'])->name('admin.user.roles.update');
    Route::get('admin/users/{user}/roles/create', [AdminController::class, 'roles_create'])->name('admin.user.roles.create');
    Route::post('admin/users/{user}/roles/create', [AdminController::class, 'roles_store'])->name('admin.user.roles.store');
    Route::get('admin/users/{user}/roles/{role}/edit', [AdminController::class, 'roles_edit'])->name('admin.user.roles.edit');
    Route::put('admin/users/{user}/roles/{role}/edit', [AdminController::class, 'roles_update'])->name('admin.user.roles.update');
    Route::delete('admin/users/{user}/roles/{role}/delete', [AdminController::class, 'roles_destroy'])->name('admin.user.roles.destroy');




  






