<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Xuatxu;
use Carbon\Carbon;
use Session;

class XuatxuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xuatxu = Xuatxu::all();
        return view('backend.xuatxu.index')
            ->with('xuatxu',$xuatxu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $xuatxu = Xuatxu::all();
        return view('backend.xuatxu.create')
        ->with('xuatxu',$xuatxu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xx_ten = $request->xx_ten;
        $xx_trangThai = $request->xx_trangThai;

       //Luu du lieu
       $xuatxu = new xuatxu();
       $xuatxu->xx_ten = $xx_ten;
       $xuatxu->xx_trangThai = $xx_trangThai;
       $xuatxu->xx_taoMoi = Carbon::now();
       $xuatxu->xx_capNhat = Carbon::now();
       $xuatxu -> save();

       Session::flash('alert - warning', 'Thêm mới thành công !');
       // Dieu huong ve trang chu
       return redirect(route('admin.xuatxu.index'));
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
        $xuatxu= Xuatxu::find($id);
        return view('backend.xuatxu.edit')
            ->with('xuatxu', $xuatxu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xuatxu= Xuatxu::find($id);
        $xuatxu->delete();

        Session::flash('alert-success', 'Xóa thành công !');
        return redirect(route('admin.xuatxu.index'));
    }
}
