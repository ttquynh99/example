@extends('backend.layouts.master')

@section('title')
    Trang danh sach loai
@endsection

@section('content')
    <h1>Danh sách loại sản phẩm</h1>
    <a class="btn btn-primary" href="{{route('admin.loai.create')}}"> Thêm mới</a>
    <table border="1" width="100%">
        <tr>
            <td>Mã</td>
            <td>Tên</td>
            <td>Ngày tạo mới</td>
            <td>Ngày cập nhật</td>
            <td>Hành động</td>
        </tr>
        @foreach($dsloai as $loai)
        <tr>
            <td>{{$loai->l_ma}}</td>
            <td>{{$loai->l_ten}}</td>
            <td>{{$loai->l_taoMoi}}</td>
            <td>{{$loai->l_capNhat}}</td>
            <td>Trống</td>
        </tr>
        @endforeach
    </table>
@endsection

