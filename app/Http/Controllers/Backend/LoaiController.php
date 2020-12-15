<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use Carbon\Carbon;
use Validator;
use App\Http\Requests\LoaiCreateRequest;
use App\Http\Requests\LoaiEditRequest;
use Session;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsloai = Loai::all();
        return view('backend.loai.index')
            ->with('dsloai',$dsloai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiCreateRequest $request)
    {
        // Lay du lieu nguoi dung nhap
    $l_ten = $request->l_ten;
    $l_trangThai = $request->l_trangThai;

    //    //Kiem tra rang buoc du lieu
    //     $validator = validator::make($request->all(),[
    //         'l_ten' => 'required|min:3|max:50|unique:cusc_loai',
    //         'l_trangThai' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect(route('admin.loai.create'))
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }


       //Luu du lieu
       $loai = new Loai();
       $loai->l_ten = $l_ten;
       $loai->l_trangThai = $l_trangThai;
       $loai->l_taoMoi = Carbon::now();
       $loai->l_capNhat = Carbon::now();
       $loai -> save();

       Session::flash('alert - warning', 'Thêm mới thành công !');
       // Dieu huong ve trang chu
       return redirect(route('admin.loai.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai= Loai::find($id);

        return view('backend.loai.edit')
            ->with('loai', $loai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoaiEditRequest $request, $id)
    {
        $loai= Loai::find($id);
        $loai->l_ten = $request->l_ten;
        $loai->l_trangThai = $request->l_trangThai;
        $loai->l_taoMoi = Carbon::now();
        $loai->l_capNhat = Carbon::now();
        $loai -> save();

        Session::flash('alert-success', 'Chỉnh sửa thành công !');

        return redirect(route('admin.loai.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai= Loai::find($id);
        $loai->delete();

        Session::flash('alert-success', 'Xóa thành công !');

        return redirect(route('admin.loai.index'));

    }
}
