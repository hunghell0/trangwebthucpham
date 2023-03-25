<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "du_an_1";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
const BASE_URL = "http://localhost/tai_khoan/";

function url($url){
    return BASE_URL.$url;
}


if(!isset($_SESSION['san_pham'])){
    $_SESSION['san_pham'] = [];
}
function redirect($key,$msg,$route) {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;
    }
    header('location:'.BASE_URL.$route."?msg=".$key);die;
}