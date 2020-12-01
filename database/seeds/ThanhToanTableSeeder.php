<?php

use Illuminate\Database\Seeder;

class ThanhToanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $type = ["Tiền mặt", "Thanh toán khi nhận hàng", "Chuyển khoản"];
        sort($type);
        $today = new DateTime('2020-12-01 18:00:00');
        for($i=1; $i<= count($type); $i++){
            array_push($list,[
                'tt_ma'  => $i,
                'tt_ten' => $type[$i-1],
                'tt_diengiai' => "Diễn giải",
                'tt_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'tt_capNhat' => $today->format('Y-m-d H:i:s'),
                'tt_trangThai' => 1
            ]);
        }
        DB::table('cusc_thanhtoan')->insert($list);
    }
}
