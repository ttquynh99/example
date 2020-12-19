@extends('backend.layouts.master')

@section('title')
    Them moi san pham
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<form name="frmCreate" id="frmCreate" method="post" action="{{route('admin.sanpham.store')}}" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten')}}">
    </div>
    <div class="form-group">
        <label for="">Giá gốc</label>
        <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ old('sp_giaGoc')}}">
    </div>
    <div class="form-group">
        <label for="">Giá bán</label>
        <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ old('sp_giaBan')}}">
    </div>
    <div class="form-group">
        <label for="">Thông tin</label>
        <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin')}}">
    </div>
    <div class="form-group">
        <label for="">Đánh giá</label>
        <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ old('sp_danhGia')}}">
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>
            <select name="sp_trangThai" id="sp_trangThai">
                <option value="1" {{old('sp_trangThai') == 1 ? 'selected' : ''}}>Khóa</option>
                <option value="2" {{old('sp_trangThai') == 2 ? 'selected' : ''}}>Khả dụng</option>
            </select>
    </div>
    <div class="form-group">
        <label for="">Loại sản phẩm</label>
            <select name="l_ma" id="l_ma">
                @foreach($dsLoai as $loai)
                <option value="{{ $loai->l_ma }}" >{{$loai->l_ten}}</option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
        <label for="">Hình</label>
        <input type="file" class="form-control" id="sp_hinh" name="sp_hinh" value="{{ old('sp_hinh')}}">
    </div>
    <button> Lưu</button>
</form>
@endsection
@section('custom-scripts')
    <!-- Các script dành cho thư viện bootstrap-fileinput -->
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

    <script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
    });
    </script>
@endsection