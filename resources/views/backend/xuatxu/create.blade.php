@extends('backend.layouts.master')

@section('title')
    Them moi xuat xu
@endsection

@section('content')
<form name="frmCreate" id="frmCreate" method="post" action="{{route('admin.xuatxu.store')}}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="">Tên xuất xứ</label>
    <input type="text" class="form-control" id="xx_ten" name="xx_ten" value="{{ old('xx_ten')}}">
  <div class="form-group">
    <label for="">Trạng thái</label>
    <select name="xx_trangThai" id="xx_trangThai">
    <option value="1" {{old('xx_trangThai') == 1 ? 'selected' : ''}}>Khóa</option>
    <option value="2" {{old('xx_trangThai') == 2 ? 'selected' : ''}}>Khả dụng</option>
    </select>
  </div>
  <button> Lưu</button>

</form>
@endsection