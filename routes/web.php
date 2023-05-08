<?php

use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
// })
Route::group(['middleware'=>'authadmin'],function(){
Route::get('/',[PageController::class,'index'])->name('index');
Route::get('/showlogin',[PageController::class,'showlogin'])->name('showlogin')->withoutMiddleware('authadmin');
Route::post('/login',[LoginController::class,'login'])->name('login')->withoutMiddleware('authadmin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout')->withoutMiddleware('authadmin');
Route::get('/admin_index',[PageController::class,'admin_index'])->name('admin_index');
Route::get('/admin_hrview',[PageController::class,'admin_hrview'])->name('admin_hrview');
Route::get('/admin_employeeview',[PageController::class,'admin_employeeview'])->name('admin_employeeview');
Route::get('/updateapprove/{id}',[DatabaseController::class,'updateapproval'])->name('admin.upadateapprove');
Route::get('/admin_salary',[PageController::class,'admin_salary'])->name('admin_salary');                                  
Route::post('/adminaddsalary',[DatabaseController::class,'admin_salarycreate'])->name('admin.addsalary');   
Route::get('/admin_viewsalary',[PageController::class,'admin_viewsalary'])->name('admin_viewsalary');
Route::get('/admin_viewempsalary',[PageController::class,'admin_viewempsalary'])->name('admin_viewempsalary');
Route::get('/admin_viewleeve',[PageController::class,'admin_viewleeve'])->name('admin.viewleeve');
Route::get('/adminleeveupdate/{id}',[DatabaseController::class,'admin_leeveapproval'])->name('admin.adminleeveupdate');
Route::get('/admin_changepassword',[PageController::class,'password'])->name('admin.password');
Route::post('change_password', [DatabaseController::class, 'changePassword'])->name('admin.changePassword');
});
Route::prefix('hr')->group(function(){

        Route::get('/index1',[PageController::class,'index1'])->name('index1');
        Route::get('/hrregister',[PageController::class,'hr_register'])->name('hr.register');
        Route::get('/hrshowlogin',[PageController::class,'hr_showlogin'])->name('hr.showlogin');
        Route::post('/hrlogin',[LoginController::class,'hr_login'])->name('hr.login');
        Route::get('/hrlogout',[LoginController::class,'hr_logout'])->name('hr.logout');
        Route::get('/hrindex',[PageController::class,'hr_index'])->name('hr.hrindex');
        Route::post('/hrcreate',[DatabaseController::class,'create'])->name('hr.create');
        Route::get('/hraddemployee',[PageController::class,'hr_addemployee'])->name('hr.addemployee');
        Route::post('/hrempcreate',[DatabaseController::class,'empcreate'])->name('hr.empcreate');
        Route::get('/hrviewemployee',[PageController::class,'hr_viewemployee',])->name('hr.viewemployee');
        Route::get('/hrsalary',[PageController::class,'hr_salary'])->name('hr.salary');
        Route::post('/hraddsalary',[DatabaseController::class,'salarycreate'])->name('hr.addsalary');
        Route::get('/hrviewsalary',[PageController::class,'hr_viewsalary'])->name('hr.viewsalary');
        Route::get('/hrprofile',[PageController::class,'hr_profile'])->name('hr.profile');
        Route::get('/hredit/{id}',[PageController::class,'hr_edit'])->name('hr.hredit');
        Route::post('/hrupdate/{id}',[PageController::class,'hr_update'])->name('hr.hrupdate');
        Route::get('/hrviewempleeve',[PageController::class,'hr_viewempleeve'])->name('hr.viewempleeve');
        Route::get('/hrleeveupdate/{id}',[DatabaseController::class,'leeveapproval'])->name('hr.hrleeveupdate');
        Route::get('/hrworksheetview',[PageController::class,'hr_worksheetview'])->name('hr.hr_worksheetview');
        Route::get('/hr_leeve',[PageController::class,'hr_leeve'])->name('hr.hr_leave');
        Route::post('/hr_leevecreate',[DatabaseController::class,'hr_leevecreate'])->name('hr.leevecreate');
        Route::get('/hr_viewresponse',[PageController::class,'hr_viewresponse'])->name('hr.hrviewresponse');
    });
    

    Route::prefix('employee')->group(function()
    {
    Route::get('/index2',[PageController::class,'index2'])->name('index2');
    Route::get('/employeeshowlogin',[PageController::class,'employee_showlogin'])->name('employee.showlogin');
    Route::post('/employeelogin',[LoginController::class,'employee_login'])->name('employee.login');
    Route::get('/employeelogout',[LoginController::class,'employee_logout'])->name('employee.logout');
    Route::get('/employeeindex',[PageController::class,'employee_index'])->name('employee.employeeindex');
    Route::get('/employeeviewsalary',[PageController::class,'employee_viewsalary'])->name('employee.viewsalary');
    Route::get('/employee_profile',[PageController::class,'employee_profile'])->name('employee.employee_profile'); 
    Route::get('/employee_edit/{id}',[pagecontroller::class,'employee_edit'])->name('employee.employee_edit');
    Route::post('/employeeupdate/{id}',[pagecontroller::class,'employee_update'])->name('employee.employee_update');
    Route::get('/employee_leave',[PageController::class,'employee_leave'])->name('employee.employee_leave');
    Route::post('/employee_leevecreate',[DatabaseController::class,'leevecreate'])->name('employee.leevecreate');
    Route::get('/employee_viewresponse',[PageController::class,'employee_viewresponse'])->name('employee.employee_viewresponse');
    Route::get('/employee_worksheet',[PageController::class,'employee_worksheet'])->name('employee.employee_worksheet');
    Route::post('/employee_worksheetcreate',[DatabaseController::class,'worksheetcreate'])->name('employee.employee_worksheetcreate');
});