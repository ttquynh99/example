<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('tt_ma')->comment('Mã phương thức thanh toán');
            $table->string('tt_ten', 191)->comment('Tên phương thức # Tên phương thức thanh toán');
            $table->text('tt_dienGiai')->comment('Thông tin # Thông tin về dịch vụ giao hàng');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán gần nhất');
            $table->tinyInteger('tt_trangThai')->default('2')->comment('Trạng thái # Trạng thái loại sản phẩm: 1-khóa, 2-hiển thị');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_thanhtoan');
    }
}
