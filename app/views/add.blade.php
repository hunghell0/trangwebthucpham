<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>hhh</h1>

{{--@if(isset($_SESSION['errors']) && isset($_GET['msg']) )--}}
{{--    <ul>--}}
{{--        @foreach($_SESSION['errors'] as $error)--}}
{{--            <li style="color: red">{{ $error }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--@endif--}}
{{--@if(isset($_SESSION['success']) && isset($_GET['msg']) )--}}
{{--    <span style="color: green">{{ $_SESSION['success'] }}</span>--}}
{{--@endif--}}

<form action="{{url('add-nguoi-dung')}}" method="post">


        Id:  <input type="text" name="id" disabled> <br>
        Họ tên: <input type="text" name="hoTen" ><br>
    @isset($_SESSION['loi']['trongHoTen'])
        <p style="color: red;">{{$_SESSION['loi']['trongHoTen']}}</p>
        @unset($_SESSION['loi']['trongHoTen'])
    @endisset
        Email: <input type="text" name="email" ><br>
    @isset($_SESSION['loi']['trongEmail'])
        <p style="color: red;">{{$_SESSION['loi']['trongEmail']}}</p>
        @unset($_SESSION['loi']['trongEmail'])
    @endisset
    @isset($_SESSION['loi']['tonTaiEmail'])
        <p style="color: red;">{{$_SESSION['loi']['tonTaiEmail']}}</p>
        @unset($_SESSION['loi']['tonTaiEmail'])
    @endisset
    @isset($_SESSION['loi']['saiEmail'])
        <p style="color: red;">{{$_SESSION['loi']['saiEmail']}}</p>
        @unset($_SESSION['loi']['saiEmail'])
    @endisset
        Mật Khẩu: <input type="text" name="matKhau" ><br>
    @isset($_SESSION['loi']['trongMatKhau'])
        <p style="color: red;">{{$_SESSION['loi']['trongMatKhau']}}</p>
        @unset($_SESSION['loi']['trongMatKhau'])
    @endisset
    @isset($_SESSION['loi']['loiMatKhau'])
        <p style="color: red;">{{$_SESSION['loi']['loiMatKhau']}}</p>
        @unset($_SESSION['loi']['loiMatKhau'])
    @endisset
        Nhập lại mật khẩu: <input type="text" name="nhapLaiMatKhau" ><br>
        Địa chỉ: <input type="text" name="dia_chi" ><br>
    @isset($_SESSION['trongDiaChi'])
        <p style="color: red;">{{$_SESSION['trongDiaChi']}}</p>
        @unset($_SESSION['trongDiaChi'])
    @endisset
        Số điện thoại: <input type="text" name="so_dien_thoai" ><br>
    @isset($_SESSION['trongSdt'])
        <p style="color: red;">{{$_SESSION['trongSdt']}}</p>
        @unset($_SESSION['trongSdt'])
    @endisset
        Vai trò : <select name="vai_tro_id" aria-label="Default select example">
            <option value="0">Chọn vai trò</option>
            <option value="1">admin</option>
            <option value="2">Khách hàng</option>
        </select>
    <button name="luu">Luu</button>


</form>
</body>
</html>