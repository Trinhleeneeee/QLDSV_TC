<?php
// kiểm tra session đã được đăng ký chưa? nếu chưa thì chuyển hướng về trang main_login.php 
// đoạn code này đặt ở đầu trang website của bạn 

session_start();
if( isset($_SESSION['userid']) == null || isset($_SESSION['level']) == null ){ 
	header("location:main_login.php"); 
} else
{
	header("location:../admin/admin.php"); 
}
?>