<?php

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

Route::get('/','Controller@index');

Route::post('/insert_student','StudentregistrationController@store');
Route::get('/student_list','StudentregistrationController@show');



Route::get('/admin','Controller@admin_login');
Route::post('/login','Auth\LoginController@login');

Route::group(['middleware'=>['auth']],function() {
    Route::get('student_registration_export','AdminExportController@exportStudentRegisterationData'); // export to excel all student registration data
    Route::get('student_accommodation_export','AdminExportController@exportStudentAcomodationData');
    Route::get('/admin_site', function () {
        return view('admin.site_admin.school_manage')->with(['url'=>'school']);
    });
//    Route::post('/insert/school','SchoolmanageController@store');
//    Route::post('/get_all_school_name','SchoolmanageController@get_all_school_name');
//    Route::post('/delete/school/{id}','SchoolmanageController@destroy');
//    Route::post('/edit/school/{id}','SchoolmanageController@edit');
//    Route::post('/update/school','SchoolmanageController@update');

    Route::get('/reg_list','StudentregistrationController@index');
// Route::post('/get_all_reg_list','StudentregistrationController@get_all_reg_list');
    Route::get('/detail/reg_list/{id}','StudentregistrationController@detail_reg');
    Route::get('/delete/reg_list/{id}','StudentregistrationController@destroy');
    Route::get('/edit/reg_list/{id}','StudentregistrationController@edit');
    Route::post('/update/reg_list','StudentregistrationController@update');

    Route::get('/accommodation_lists','StudentregistrationController@show_accommodation');
    Route::get('/logout','Auth\LoginController@logout');
     Route::get('report','StudentregistrationController@report');
    Route::get('paid_students','StudentregistrationController@paid_students');
    Route::get('no_paid_students','StudentregistrationController@no_paid_students');
    Route::get('student_payment_export','AdminExportController@studentPaymentExport');
    
     /* soft delete */
    Route::get('stu_regi_trash_data','StudentregistrationController@trashData');
    Route::get('restore/reg_list/{id}','StudentregistrationController@restoreStgData');
    Route::get('trash/reg_list/{id}','StudentregistrationController@permanentDelete');
    

});


