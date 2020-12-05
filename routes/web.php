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
// route Hiển thị màn hình hello
Route::get('/hello', 'ExampleController@hello');
// route Hiển thị màn hình goodbye
Route::get('/goodbye', 'ExampleController@goodbye');


Route::get('/today','ExampleController@ngay');

// route hiển thị màn hình Danh sách nhân viên
Route::get('/example/danhsachnhanvien', 'ExampleController@danhsachnhanvien');

//Route test Model
Route::get('test', 'TestController@getDanhSachLoai');
Route::get('testsp', 'TestController@getDanhSachSanpham');