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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
============================================
        Category Routes
============================================

*/
//Route::group(['middleware'=>'AuthenticateMiddleware'],function(){
Route::prefix('category')->group(function(){
Route::get('/save','CategoryController@index');
Route::post('/save','CategoryController@save');
Route::get('/manage','CategoryController@manage');
Route::get('/edit/{id}','CategoryController@edit');
Route::post('/edit','CategoryController@update');
Route::get('/delete/{id}','CategoryController@delete');

});

/*
============================================
        Meeting Routes
============================================

*/
Route::prefix('meeting')->group(function(){

Route::get('/entry','MeetingController@index');
Route::post('/entry','MeetingController@yes');
Route::get('/manage','MeetingController@manage')->name('meeting.manage');
Route::get('/view/{id}','MeetingController@singleMeeting');
Route::get('/edit/{id}','MeetingController@editMeeting');
Route::post('/edit','MeetingController@updateMeeting');
Route::get('/delete/{id}','MeetingController@deleteMeeting');
});
// Route::GET('/mettingManage',function(){
//  return view('admin.meeting.meetingManage');
// });



//});














