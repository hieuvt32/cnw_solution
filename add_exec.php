<?php

// Bẫy lỗi để trống trường dữ liệu trong Form
// Tên Sản phẩm
include("lib_db.php");
$success = false;
$ten_sp = isset($_REQUEST['ten_sp']) ? $_REQUEST['ten_sp']:"";
if(empty($ten_sp)){
    $error_ten_sp = 'Bạn chưa nhập tên sản phẩm';
    $success = true;
}

$tmp = $anh_sp = isset($_FILES['anh_sp']) ? $_FILES['anh_sp']:"";
if(empty($anh_sp)){
    $error_anh_sp = 'Bạn chưa nhập ảnh sản phẩm';
    $success = true;
}

$gia_sp = isset($_REQUEST['gia_sp']) ? $_REQUEST['gia_sp']:"";
if(empty($gia_sp)){
    $error_gia_sp = 'Bạn chưa nhập giá sản phẩm';
    $success = true;
}

$id_dm = isset($_REQUEST['id_dm']) ?$_REQUEST['id_dm']:0;
if(empty($id_dm)){
    $error_id_dm = 'Bạn chưa nhập danh mục sản phẩm';
    $success = true;
}

$trang_thai = (isset($_REQUEST['trang_thai']) &&
$_REQUEST['trang_thai'] == '1') ? $_REQUEST['trang_thai']:"";
if(empty($trang_thai)){
    $error_trang_thai = 'Bạn chưa nhập trạng thái sản phẩm';
    $success = true;
}

$id_hang = isset($_REQUEST['id_hang']) ? $_REQUEST['id_hang']:0;
if(empty($id_hang)){
    $error_id_hang = 'Bạn chưa nhập tên sản phẩm';
    $success = true;
}

$chi_tiet = isset($_REQUEST['chi_tiet']) ? $_REQUEST['chi_tiet']:"";
if(empty($chi_tiet)){
    $error_chi_tiet = 'Bạn chưa nhập chi tiết sản phẩm';
    $success = true;
}

// Chi tiết Sản phẩm
// echo $_REQUEST['chi_tiet'];
// Sản phẩm Đặc biệt
$dac_biet =isset($_REQUEST['dac_biet'])?$_REQUEST['dac_biet']: array();
$dac_biet_insert = "";
if(empty($dac_biet)){
    $error_chi_tiet = 'Bạn chưa nhập chi tiết sản phẩm';
    $success = true;
}
else{
    $dac_biet = $_REQUEST['dac_biet'];
    foreach($dac_biet as $obj){
        $dac_biet_insert = $obj;
    }
}
// Thực thi lệnh Thêm thông tin sản phẩm mới vào CSDL
//if(isset($ten_sp) && isset($anh_sp) && isset($gia_sp) && isset($id_dm) && isset($trang_thai) && isset($chi_tiet)  && isset($ten_hang) && isset($dac_biet)){

if(!$success){
    move_uploaded_file($tmp, 'images/'.$anh_sp);
    // Thêm Thông tin Sản phẩm vào CSDL
    $sql = "INSERT INTO sanpham(ten_sp, anh_sp, gia_sp, id_dm, trang_thai, chi_tiet, id_hang, dac_biet)
    VALUES('{$ten_sp}', '{$anh_sp}', '{$gia_sp}', {$id_dm}, {$trang_thai}, '{$chi_tiet}',  {$id_hang}, {$dac_biet_insert})";
    //$result = $db->exec($sql)
    echo $sql;
    $query = exec_update($sql);
    echo $query;
    // Chuyển hướng đến trang Danh sách Sản phẩm để xem Sản phẩm mới thêm vào
    header('location:product.php');
}
else{
    header('location:add.php?error_ten_sp='.$error_ten_sp ."&error_anh_sp=".$error_anh_sp."&error_gia_sp=".$error_gia_sp.'&error_id_hang='.$error_id_hang.'&error_id_dm='.$error_id_dm."&error_trang_thai=".$error_trang_thai."&error_chi_tiet=".$error_chi_tiet);
}
?>