<?php
namespace App\Controllers;
use App\Models\TaiKhoan;

class TaiKhoanController extends BaseController
{
    public $taiKhoan;

    public function __construct()
    {
        $this->taiKhoan = new TaiKhoan();
    }

    // danh sách người dùng
    public function danhSach()
    {
        $all = $this->taiKhoan->loadAllNguoiDung('nguoi_dung', 0, 10);
        $title = "Danh sách người dùng";
        $i = 0;
        $this->render('dsNguoiDung', compact('all', 'title', 'i'));
    }

    public function add()
    {
        $this->render('add');
    }

    public function addPost()
    {
        if(isset($_POST['luu'])) {
            $hoTen = $_POST['hoTen'];
            $email = $_POST['email'];
            $matKhau = $_POST['matKhau'];
            $mh_matKhau = password_hash($matKhau, PASSWORD_DEFAULT);
            $dia_chi = $_POST['dia_chi'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $vai_tro_id = 2;
            $errors = [];

            if(strlen(trim($hoTen)) == 0){
                $errors['trongHoTen'] = "Họ tên không được để trống!";
            }

            if(strlen(trim($email)) == 0){
                $errors['trongEmail'] = "Email không được để trống!";
            }else{

                if($this->taiKhoan->checkEmaill($email)){
                    $checkEmail = $this->taiKhoan->checkEmail($email);
                    if($checkEmail){
                        $errors['tonTaiEmail'] = "Email đã được đăng ký!";
                    }
                }else{
                    $errors['saiEmail'] = "Email sai định dạng!";
                }
            }

            if(strlen(trim($matKhau)) == 0){
                $errors['trongMatKhau'] = "Mật khẩu không được để trống!";
            }else{
                if(!$this->taiKhoan->checkMatKhau($matKhau)){
                    $errors['loiMatKhau'] = "Mật khẩu phải tối thiểu 8 ký tự và ít nhất 1 chữ cái, 1 số!";
                }
            }
            if(strlen(trim($so_dien_thoai))==0){
                $errors['trongSdt'] = "Không được để trống số điện thoai";
            }
            if(str(trim($dia_chi)) == 0) {
                $errors['trongDiaChi'] = "Không được để trống địa chỉ";
            }
            if(count($errors) > 0){
                $_SESSION['loi'] = $errors;
                header('location: '.BASE_URL."add");
            }else{
                $result = $this->taiKhoan->dangKy($hoTen,$email,$mh_matKhau,$dia_chi,$so_dien_thoai,$vai_tro_id);
                if($result){
                    $_SESSION['thong_bao'] = "Bạn đã đăng ký thành công";
                    header('location: '.BASE_URL."/");
                }
            }
        }
    }
}


