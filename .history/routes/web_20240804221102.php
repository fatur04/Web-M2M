<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SLAController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BWAController;
use App\Http\Controllers\ISRController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\M2MSASTController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\sla_internalController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SplitterController;
use App\Http\Controllers\SC1Controller;
use App\Http\Controllers\SoltempController;
use App\Http\Controllers\StravaController;
use App\Http\Controllers\WhatsappController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);
//Route::get('/login', [LoginController::class, 'showLoginForm']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    //Route::get('/dashboard', [SLAController::class, 'dashboard']);
    //Route::get('/hasil/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'hasil']);
    //Route::get('/dashboard_view/{primacom}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'dashboard_view']);

    Route::get('/index', [SLAController::class, 'index']);
    Route::get('/datatable', [SLAController::class, 'yajra']);
    Route::post('/simpan', [SLAController::class, 'simpan']);
    Route::get('/tambah', [SLAController::class, 'tambah']);
    Route::get('/edit/{id}', [SLAController::class, 'edit']);
    Route::get('/cari', [SLAController::class, 'loadData']);
    Route::get('/coba', [SLAController::class, 'coba']);
    Route::post('/update/{id}', [SLAController::class, 'update']);
    Route::delete('/delete/{id}', [SLAController::class, 'delete']);
    Route::get('/status/{id}', [SLAController::class, 'status']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/datatableuser', [UserController::class, 'yajra']);
    Route::post('/user/simpan', [UserController::class, 'simpan']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

    Route::get('/sla_internal', [sla_internalController::class, 'index']);
    Route::get('/datatable_internal', [sla_internalController::class, 'yajra']);
    Route::get('/tambah_internal', [sla_internalController::class, 'tambah']);
    Route::post('/simpan_internal', [sla_internalController::class, 'simpan']);
    Route::get('/edit_internal/{id}', [sla_internalController::class, 'edit']);
    Route::post('/update_internal/{id}', [sla_internalController::class, 'update']);
    Route::delete('/delete_internal/{id}', [sla_internalController::class, 'delete']);

    Route::get('/report', [SLAController::class, 'reportindex']);
    Route::get('/reportsla', [SLAController::class, 'reportsla']);
    Route::get('/reportsla_datatable', [SLAController::class, 'report_yazra']);
    Route::get('/carireport', [SLAController::class, 'report_loadData']);
    Route::get('/view_report/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'viewreport']);
    Route::get('/excel/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'export_excel']);
    Route::get('/pdf/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'pdf']);

    Route::get('/detail_report/{id}', [SLAController::class, 'detailreport']);
    Route::get('/view_detail/{id}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'viewdetail']);
    Route::get('/excel_detail/{id}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'export_exceldetail']);
    Route::get('/pdf_detail/{id}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'pdf_detail']);

    Route::get('/reportsite', [SLAController::class, 'reportsite']);
    Route::get('/view_site/{isp}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'viewsite']);
    Route::get('/excel_site/{isp}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'excel_site']);
    Route::get('/pdf_site/{isp}/{tgl_awal}/{tgl_akhir}', [SLAController::class, 'pdf_site']);

    Route::get('/monitoring', [MonitoringController::class, 'monitoring']);

    #Route::get('member', Members::class)->name('member');

    Route::get('/splitter', [SplitterController::class, 'index']);
    Route::get('/datatable_splitter', [SplitterController::class, 'yajra']);
    Route::get('/tambah_splitter', [SplitterController::class, 'tambah']);
    Route::post('/simpan_splitter', [SplitterController::class, 'simpan']);
    Route::get('/show_splitter/{id}', [SplitterController::class, 'show']);
    Route::get('/edit_splitter/{id}', [SplitterController::class, 'edit']);
    Route::post('/update_splitter/{id}', [SplitterController::class, 'update'])->name('splitter.show');
    Route::delete('/delete_splitter/{id}', [SplitterController::class, 'delete']);

    Route::get('/sc1', [SC1Controller::class, 'index']);
    Route::get('/datatable_sc1', [SC1Controller::class, 'yajra']);
    Route::get('/tambah_sc1', [SC1Controller::class, 'tambah']);
    Route::post('/simpan_sc1', [SC1Controller::class, 'simpan']);
    Route::get('/show_sc1/{id}', [SC1Controller::class, 'show']);
    Route::get('/edit_sc1/{id}', [SC1Controller::class, 'edit']);
    Route::post('/update_sc1/{id}', [SC1Controller::class, 'update'])->name('sc1.show');
    Route::delete('/delete_sc1/{id}', [SC1Controller::class, 'delete']);

    //Route::get('/map', [MapController::class, 'showMap']);

    Route::get('/strava', [StravaController::class, 'index']);
    Route::get('/datatable_strava', [StravaController::class, 'yajra']);
    Route::post('/strava/simpan', [StravaController::class, 'simpan']);
    Route::get('/strava/edit/{id}', [StravaController::class, 'edit']);
    Route::post('/strava/update/{id}', [StravaController::class, 'update']);
    Route::delete('/strava/delete/{id}', [StravaController::class, 'delete']);

    Route::get('/revenue', [RevenueController::class, 'index']);
    Route::get('/datatable_revenue', [RevenueController::class, 'yajra']);
    Route::post('/revenue/simpan', [RevenueController::class, 'simpan']);
    Route::get('/revenue/edit/{id}', [RevenueController::class, 'edit']);
    Route::post('/revenue/update/{id}', [RevenueController::class, 'update']);
    Route::delete('/revenue/delete/{id}', [RevenueController::class, 'delete']);
    Route::get('/revenue_allpop', [RevenueController::class, 'allpop']);
    Route::get('/revenue_allpop/{pop}', [RevenueController::class, 'allpoppop']);
    Route::get('/revenue_allpop/revenuepop/{pop}', [RevenueController::class, 'yazranode']);

    Route::get('search', 'RevenueController@search')->name('search');

    Route::get('/whatsapp', [WhatsappController::class, 'show']);
    Route::get('/send-whatsapp{id}', [WhatsappController::class, 'sendMessage']);
    Route::get('/logout', [WhatsappController::class, 'logout']);

    Route::get('/soltemp', [SoltempController::class, 'show']);
    Route::get('/soltemp/update-status/{id}', [SoltempController::class, 'status']);
    Route::post('/soltemp/simpan', [SoltempController::class, 'simpan']);
    Route::get('/soltemp/edit/{id}', [SoltempController::class, 'edit']);
    Route::post('/soltemp/update/{id}', [SoltempController::class, 'update']);
    Route::delete('/soltemp/delete/{id}', [SoltempController::class, 'delete']);

    Route::get('/m2msast', [M2MSASTController::class, 'show']);
    Route::get('/m2msast/update-status/{nojar}', [M2MSASTController::class, 'status']);
    Route::post('/m2msast/simpan', [M2MSASTController::class, 'simpan']);
    Route::get('/m2msast/edit/{id}', [M2MSASTController::class, 'edit']);
    Route::post('/m2msast/update/{id}', [M2MSASTController::class, 'update']);
    Route::delete('/m2msast/delete/{id}', [M2MSASTController::class, 'delete']);

    Route::get('/m2mbwa', [BWAController::class, 'show']);
    Route::get('/m2mbwa/update-status/{nojar}', [BWAController::class, 'status']);
    Route::post('/m2mbwa/simpan', [BWAController::class, 'simpan']);
    Route::get('/m2mbwa/edit/{id}', [BWAController::class, 'edit']);
    Route::post('/m2mbwa/update/{id}', [BWAController::class, 'update']);
    Route::delete('/m2mbwa/delete/{id}', [BWAController::class, 'delete']);

    Route::get('/isr', [ISRController::class, 'index']);
    Route::post('/isr/simpan', [ISRController::class, 'simpan']);
    Route::get('/isr/edit/{id}', [ISRController::class, 'edit']);
    Route::post('/isr/update/{id}', [ISRController::class, 'update']);
    Route::delete('/isr/delete/{id}', [ISRController::class, 'delete']);

    Route::get('/logactivity', [LogActivityController::class, 'index']);
    Route::get('/logupdate', [LogActivityController::class, 'update']);
    Route::get('/formActivity', [LogActivityController::class, 'form']);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
