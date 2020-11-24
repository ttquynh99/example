<h1>Hôm nay là</h1>
<?php 
    $chuoingay = date('d-m-Y H:i:s');
?>
<h2><?= $chuoingay ?></h2>
<ul>
    <li>Tổng số sinh viên là:
    <span style="border: 1px solid red;">{{ $diemthi }}</span>
    </li>
    <li>Họ tên: {{ $hoten }}</li>
</ul>

<div>
    @if( $dadangnhap == true)
        <button>Dang xuat</button>
    @else 
        <button>Dang nhap</button>
    @endif
</div>

<table>
    <tr>
        <td>Mã số</td>
        <td>Tên</td>
        <td>Họ</td>
        <td>email</td>
        <td>gender</td>
        <td>ip</td>
    </tr>
    @foreach($dulieu as $row)
    <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->first_name }}</td>
        <td></td>
        <td>email</td>
        <td>gender</td>
        <td>ip</td>
    </tr>
    @endforeach
</table>