<?php
	include('../includes/config.php');
	error_reporting(0);
	if(strlen($_SESSION['alogin'])==0){
		header("location:login.php");
	}
	date_default_timezone_set('Asia/Kolkata');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );

	if(isset($_GET['pid'])){
		$status=0;
		if($_GET['act']=="enable"){
			$status=1;
		}
		$sql ="UPDATE products SET productAvailability=$status WHERE id=".intval($_GET['pid']);
		$query = mysqli_query($connection,$sql);
		if($query){
			echo "<script>alert('Product status Updated');location='manageproducts.php';</script>";
		}else{
			echo "<script>alert('Something went wrong please try again after some times.');location='managecategory.php';</script>";
		}
	}
?>