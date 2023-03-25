<?php
namespace App\Models;
class TaiKhoan extends BaseModel{

    //show ra danh sách người dùng
    public function loadAllNguoiDung($table,$limit1,$limit2){
        $sql = "select *,A.id as id from $table A 
                inner join vai_tro B on A.vai_tro_id = B.id 
                order by A.id desc";
        if ($limit1 >= 0 && $limit2 > 0) {
            $sql .= " limit $limit1,$limit2";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // thêm người dùng

    public function dangKy($hoTen,$email,$matKhau,$dia_chi,$so_dien_thoai,$vai_tro_id){
        $sql = "insert into nguoi_dung(hoTen,email,matKhau,dia_chi,so_dien_thoai,vai_tro_id) values (?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$hoTen,$email,$matKhau,$dia_chi,$so_dien_thoai,$vai_tro_id]);
    }
    //Check email
    public function checkEmail($email){
        $sql = "select email from nguoi_dung where email = '$email'";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    //validate email
    public function checkEmaill($email)
    {
        return (bool)preg_match ("/^\\S+@\\S+\\.\\S+$/", $email);
    }

    //validate mật khẩu
    public function checkMatKhau($matKhau){
        return (bool)preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$matKhau);
    }
    //đăng nhập
    public function dangNhap($email){
        $sql = "SELECT * FROM nguoi_dung A INNER JOIN vai_tro B ON A.vai_tro_id = B.id WHERE A.email = ?";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
}