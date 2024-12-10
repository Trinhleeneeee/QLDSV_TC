<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8' />
	
	<title>Quản lý điểm Sinh Viên</title>
	
	<link rel='stylesheet' href='css/style.css' />
</head>

<body>
	<div id="container">
	<div id="header">
		<h1><a href="">Student Infomation System</a></h1>
        <p class="slogan">Ha Noi University of Science and Technology</p>
	</div>
	<div id="navigation">
		<ul>
	        <li><a href='index.php'>Home</a></li>
			<li><a href='#'>About</a></li>
			<li><a href='#'>Liên hệ</a></li>
			<li><a href='#'>Hỏi - Đáp</a></li>
			
			<?php
				session_start();
				if( isset($_SESSION['userid']) == null ){ 
					echo "<li><a HREF = 'login/main_login.php'>Đăng nhập</a></li>"; 
				} else
				{
					echo "<li><a HREF = '../login/logout.php'>Đăng xuất</a></li>"; 
				}
			?>
		</ul>
        <?php
			if ( isset($_SESSION['userid']) == null )
			{
				echo "<p class='greeting'>Xin chào Khách!</p>";
			} else
			{
				echo "<p class='greeting'>Xin chào ".$_SESSION['userid']."!</p>";
			}
		?>
        
</div><!-- end navigation-->