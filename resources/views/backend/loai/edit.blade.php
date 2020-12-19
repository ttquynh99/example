@extends('backend.layouts.master')

@section('title')
    Chinh sua loai san pham
@endsection

@section('content')
<form name="frmEdit" id="frmEdit" method="post" action="{{route('admin.loai.update', ['id' => $loai->l_ma] ) }}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
    <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ $loai->l_ten}}" />
  <div class="form-group">
    <label for="exampleInputEmail1">Trạng thái</label>
    <select name="l_trangThai" id="l_trangThai">
    <option value="1" {{$loai->l_trangThai == 1 ? 'selected' : ''}}>Khóa</option>
    <option value="2" {{$loai->l_trangThai == 2 ? 'selected' : ''}}>Khả dụng</option>
    </select>
  </div>
  <button class="btn btn-primary"> Lưu</button>
</form>
@endsection