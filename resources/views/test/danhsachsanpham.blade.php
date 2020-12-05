<h1>Danh sách loại</h1>
<table border="1" width="100%">
    <tr>
        <td>Mã</td>
        <td>Tên</td>
        <td>Ngày tạo mới</td>
        <td>Ngày cập nhật</td>
        <td>Trạng thái</td>
        <td>Loại</td>
    </tr>
    @foreach($ds_sp as $sp)
    <tr>
        <td>{{$sp->sp_ma}}</td>
        <td>{{$sp->sp_ten}}</td>
        <td>{{$sp->sp_taoMoi}}</td>
        <td>{{$sp->sp_capNhat}}</td>
        <td>
            <?php
                $trangthai='';
                if($sp->sp_trangThai == 1){
                    $trangthai = 'Khóa';
                } else if($sp->sp_trangThai == 2){
                    $trangthai = 'Khả dụng';
                }
            ?>
            {{$trangthai}}
        </td>
        <td>
        {{$sp->loaisp->l_ten}}
        </td>
    </tr>
    @endforeach
</tabspe>