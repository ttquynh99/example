@extends('backend.layouts.master')

@section('title')
    Them moi loai san pham
@endsection

@section('content')
<form name="frmCreate" id="frmCreate" method="post" action="{{route('admin.loai.store')}}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
    <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ old('l_ten')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng thái</label>
    <select name="l_trangThai" id="l_trangThai">
    <option value="1" {{old('l_trangThai') == 1 ? 'selected' : ''}}>Khóa</option>
    <option value="2" {{old('l_trangThai') == 2 ? 'selected' : ''}}>Khả dụng</option>
    </select>
  </div>
  <button> Lưu</button>

</form>
@endsection