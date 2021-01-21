<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BaoCaoController extends Controller
{
    public function donhang()
    {
        return view('backend.reports.donhang');
    }
    public function donhangData(Request $request)
    {
        $parameter = [
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay
        ];
        $sql = <<<EOT
            SELECT dh.dh_thoiGianDatHang as thoiGian
                , SUM(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) as tongThanhTien
            FROM cusc_donhang dh
            JOIN cusc_chitietdonhang ctdh ON dh.dh_ma = ctdh.dh_ma
            WHERE dh.dh_thoiGianDatHang BETWEEN :tuNgay AND :denNgay
            GROUP BY dh.dh_thoiGianDatHang
EOT;
        $data = DB::select($sql, $parameter);
        //Trả về kiểu json laravel hỗ trợ
        return response()->json(array(
            'code'  => 200, //Thành công trả về mã lỗi và data
            'data' => $data,
        ));
    }
}
