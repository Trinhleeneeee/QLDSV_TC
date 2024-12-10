<?php
session_start();
if ( isset($_SESSION['userid']) && isset($_SESSION['level']) )
{
	unset($_SESSION['userid']);
	unset($_SESSION['level']);
}
session_destroy();
header("location:../index.php"); 
?>