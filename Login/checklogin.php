<?php
// Khai báo biến
$host="localhost"; // Tên Host
$username="root"; // Tên tài khoản gốc của Mysql
$password=""; // Mật khẩu tài khoản gốc Mysql - thường mặc định là rỗng nếu dùng xampp
$db_name="quanlisinhvien"; // Tên CSDL
$tbl_name="user"; // Tên bảng cần truy vấn Table

// Kết nối đến server và lựa chọn cơ sở dữ liệu
mysql_connect("$host", "$username", "$password")or die("cannot connect");  
mysql_select_db("$db_name")or die("Không thể kết nối đến cơ sở dữ liệu"); 

// username và password gởi đến từ form đăng nhập 
$myusername=$_POST['myusername'];  
$mypassword=$_POST['mypassword'];  

// để bảo vệ khỏi  MySQL injection (more detail about MySQL injection) 
$myusername = stripslashes($myusername); 
$mypassword = stripslashes($mypassword); 
$myusername = mysql_real_escape_string($myusername); 
$mypassword = mysql_real_escape_string($mypassword); 
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'"; 
$result=mysql_query($sql); 
// Mysql_num_row số user tìm thấy từ database 
$count=mysql_num_rows($result); 
// nếu tìm thấy  $myusername và $mypassword, kết quả trả về sẽ là 1 dòng 

if($count==1){ 
	// đăng ký $myusername, $mypassword và chuyển xong file "login_success.php" 
	session_start();
	$_SESSION['userid'] = $myusername;
	$_SESSION['level'] = $mypassword;

	header("location:login_success.php"); 
} 
else { 
	echo "Sai Username hoac Password"; 
}
?>