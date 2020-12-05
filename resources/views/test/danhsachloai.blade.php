<h1>Danh sách loại</h1>
<table border="1" width="100%">
    <tr>
        <td>Mã</td>
        <td>Tên</td>
        <td>Ngày tạo mới</td>
        <td>Ngày cập nhật</td>
        <td>Trạng thái</td>
        <td>Số lượng</td>
    </tr>
    @foreach($ds_loai as $loai)
    <tr>
        <td>{{$loai->l_ma}}</td>
        <td>{{$loai->l_ten}}</td>
        <td>{{$loai->l_taoMoi}}</td>
        <td>{{$loai->l_capNhat}}</td>
        <td>
            <?php
                $trangthai='';
                if($loai->l_trangThai == 1){
                    $trangthai = 'Khóa';
                } else if($loai->l_trangThai == 2){
                    $trangthai = 'Khả dụng';
                }
            ?>
            {{$trangthai}}
        </td>
        <td>
        {{$loai->danhsachsp->count()}}
        </td>
    </tr>
    @endforeach
</table>