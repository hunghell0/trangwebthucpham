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
<table border="1">
    <tr>
        <th>id</th>
        <th>họ tên</th>
        <th>địa chỉ</th>
        <th>email</th>
        <th>số điện thoại</th>
        <th>mật khậu</th>
        <th>vai trò</th>
        <th><a href="{{url('add')}}">Đăng ký</a></th>
    </tr>
     @foreach($all as $v)
         <tr>
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->hoTen}}</td>
            <td>{{$v->dia_chi}}</td>
            <td>{{$v->email}}</td>
            <td>{{$v->so_dien_thoai}}</td>
            <td>{{$v->matKhau}}</td>
            <td>{{$v->ten}}</td>
            <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
        </tr>
         </tr>
     @endforeach
</table>
</body>
</html>