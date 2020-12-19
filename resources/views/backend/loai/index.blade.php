@extends('backend.layouts.master')

@section('title')
    Trang danh sach loai
@endsection

@section('content')
    @if(Session::has('alert-success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('alert-success')}}
    </div>
    @endif

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
            <td>
                <a href="{{ route ('admin.loai.edit', ['id' => $loai->l_ma] )}}" class="btn btn-success"> Sửa</a>
                <form class="frmDelete " method="post" name ="frmDelete" data-id="{{$loai->l_ma}}" class="btn btn-danger" action="{{route('admin.loai.destroy',['id'=>$loai->l_ma])}}">
                {{ csrf_field() }}
                    <input type="hidden" name='_method' value="DELETE" />
                    <button class="btn btn-danger" >Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection


@section('custom-scripts')
<script>
$(function(){
    $('.frmDelete').submit(function(e){
        e.preventDefault();
        var id=$(this).data('id');
        swal.fire({
            title: 'Bạn có chắc muốn xóa?',
            text: 'Bạn sẽ không thể phục hồi khi xóa!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Có, hãy xóa',
            cancelButtonText: 'Không',
            confirmButtonColor: '#3085d6',
            cancelButtonColor:'#d33'
            }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    type:'post',
                    url: $(this).attr('action'),
                    data: {
                        id: id,
                        _token:$(this).find('[name=_token]').val(),
                        _method:$(this).find('[name=_method]').val()
                    },
                    success: function(data, textStatus, jqXHR){
                        location.href = '{{ route('admin.loai.index') }}';
                        debugger;
                    },
                    error: function(jqXHR,textStatus,errorThown){
                    }
                });
            }
        })
    });
});
</script>
    
@endsection

