<?php include('../includes/header.php'); ?>
<?php include('../includes/mysqli_connect.php');?>
<?php 
	if ( isset($_SESSION['userid']) == null )
	{
		include('../includes/sidebar-a.php');
	} else
	{
		include('../includes/sidebar-admin.php');
	}
?>
<div id="content">
   
	
</div><!--end content-->

<?php include('../includes/footer.php'); ?>

    

