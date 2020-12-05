<?php

namespace App\Http\Controllers;

use App\Loai;
use App\Sanpham;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getDanhSachLoai(){
        $danhsachloai = Loai::all();
        return view('test.danhsachloai')
            ->with('ds_loai', $danhsachloai);
    }
    public function getDanhSachSanpham(){
        $danhsachsp = Sanpham::all();
        return view('test.danhsachsanpham')
            ->with('ds_sp', $danhsachsp);
    }
}




