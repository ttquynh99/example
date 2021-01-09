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
Route::get('testbackend', function(){
    return view('test.backend');
});

Route::get('admin/loai','Backend\LoaiController@index')->name('admin.loai.index');

Route::get('admin/loai/create','Backend\LoaiController@create')->name('admin.loai.create');
Route::post('admin/loai/store','Backend\LoaiController@store')->name('admin.loai.store');

Route::get('admin/loai/edit/{id}','Backend\LoaiController@edit')->name('admin.loai.edit');
Route::put('admin/loai/update/{id}','Backend\LoaiController@update')->name('admin.loai.update');

Route::delete('admin/loai/delete/{id}','Backend\LoaiController@destroy')->name('admin.loai.destroy');



//Route sản phẩm
Route::get('/admin/sanpham/print', 'Backend\SanphamController@print')->name('admin.sanpham.print');
Route::get('/admin/sanpham/excel', 'Backend\SanphamController@excel')->name('admin.sanpham.excel');
Route::get('/admin/sanpham/pdf', 'Backend\SanPhamController@pdf')->name('admin.sanpham.pdf');

Route::resource('/admin/sanpham', 'Backend\SanphamController' , ['as' => 'admin']);


//Route xuất xứ

Route::resource('/admin/xuatxu', 'Backend\XuatxuController' , ['as' => 'admin']);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/test', function() {
    return bcrypt('12345');
});