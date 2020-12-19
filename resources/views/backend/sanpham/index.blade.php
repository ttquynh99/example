@extends('backend.layouts.master')

@section('title')
    Trang danh sach san pham
@endsection

@section('content')


    <table class="table table-bordered">
    <a class="btn btn-primary" href="{{route('admin.sanpham.create')}}"> Thêm mới</a>
    <tr>
        <td>Mã</td>
        <td>Tên</td>
        <td>Giá</td>
        <td>Thông tin</td>
        <td>Hình</td>
        
    </tr>
    @foreach($dsSanpham as $sp)
        <tr>
            <td>{{$sp->sp_ma}}</td>
            <td>{{$sp->sp_ten}}</td>
            <td>{{$sp->sp_giaGoc}}</td>
            <td>{{$sp->sp_thongTin}}</td>
            <td>{{$sp->sp_hinh}}</td>
            
        </tr>
    @endforeach
    </table>
@endsection