@extends('backend.layouts.master')

@section('title')
    Trang danh sach san pham
@endsection
@section('custom-css')
<style>
.img-dd{
    width: 100px;
    height:100px;
}
</style>

@endsection





@section('content')
@if(Session::has('alert-info'))
    <div class="alert alert-success" role="alert">
    {{Session::get('alert-info')}}
    </div>
    @endif

    <table class="table table-bordered">
    <a class="btn btn-primary" href="{{route('admin.sanpham.create')}}"> Thêm mới</a>
    <a class="btn btn-success" href="{{route('admin.sanpham.print')}}"> In</a>
    <a href="{{ route('admin.sanpham.excel') }}" class="btn btn-primary">Xuất Excel</a>
    <a href="{{ route('admin.sanpham.pdf') }}" class="btn btn-success">Xuất PDF</a>
    <tr>
        <td>Mã</td>
        <td>Tên</td>
        <td>Giá</td>
        <td>Thông tin</td>
        <td>Hình</td>
        <td>Hành động</td>
        
    </tr>
    @foreach($dsSanpham as $sp)
        <tr>
            <td>{{$sp->sp_ma}}</td>
            <td>{{$sp->sp_ten}}</td>
            <td>{{$sp->sp_giaGoc}}</td>
            <td>{{$sp->sp_thongTin}}</td>
            <td>
            <img src="{{asset('storage/photos/' . $sp->sp_hinh) }}" class="img-dd" />
            </td>
            <td>
            <a href="{{ route ('admin.sanpham.edit', ['id' => $sp->sp_ma] )}}" class="btn btn-success"> Sửa</a>
            <form method="post" action="{{ route('admin.sanpham.destroy', ['id' => $sp->sp_ma]) }}" class="pull-left">
                <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                <input type="hidden" name="_method" value="DELETE" />
                <!-- Khi gởi bất kỳ Request POST, Laravel Framework mặc định cần có token để chống lỗi bảo mật CSRF 
                - Bạn có thể tắt đi, nhưng lời khuyên là không nên tắt chế độ bảo mật CSRF đi.
                - Thay vào đó, sử dụng hàm `csrf_field()` để tự sinh ra 1 input có token dành riêng cho CSRF
                -->
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
            </td>
        </tr>
    @endforeach
    </table>
@endsection