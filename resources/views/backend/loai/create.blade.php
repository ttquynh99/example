@extends('backend.layouts.master')

@section('title')
    Them moi loai san pham
@endsection

@section('content')
<form name="frmCreate" id="frmCreate" method="post" href="{{route('admin.loai.create')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
    <input type="text" class="form-control" id="l_ten" name="l_ten">
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng thái</label>
    <select name="l_trangThai" id="l_trangThai">
    <option value="1">Khóa</option>
    <option value="2">Khả dụng</option>
    </select>
  </div>
</form>
@endsection