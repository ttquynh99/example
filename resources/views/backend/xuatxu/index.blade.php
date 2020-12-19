@extends('backend.layouts.master')

@section('title')
    Trang danh sach san pham
@endsection

@section('content')
    @if(Session::has('alert-success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('alert-success')}}
    </div>
    @endif

    <table class="table table-bordered">
    <a class="btn btn-primary" href="{{route('admin.xuatxu.create')}}"> Thêm mới</a>
    <tr>
        <td>Mã</td>
        <td>Tên</td>
        <td>Trạng thái</td>  
        <td>Hành động</td> 
    </tr>
    @foreach($xuatxu as $xx)
        <tr>
            <td>{{$xx->xx_ma}}</td>
            <td>{{$xx->xx_ten}}</td>
            <td>{{$xx->xx_trangThai}}</td>
            <td>
                <a href="{{ route ('admin.xuatxu.edit', ['id' => $xx->xx_ma] )}}" class="btn btn-success"> Sửa</a>
                <a href="{{ route ('admin.xuatxu.destroy', ['id' => $xx->xx_ma] )}}" class="btn btn-danger"> Xóa</a>
            </td>
        </tr>
    @endforeach
    
    </table>
@endsection