<?php
include('../includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Thean</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" href="../assets/semantic-ui/dist/semantic.css">
	<link rel="stylesheet" href="../assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../assets/datatables/media/css/dataTables.semanticui.css">

	<script type="text/javascript" src="../assets/jquery/jquery.js"></script>
	<script type="text/javascript">
		$("#preloader").show();
	</script>
</head>
<body>
	<?php include('includes/menu-bar.php');?>
	<div class="pusher">
		<div class="ui stackable page grid">
			<div class="row" align="center">
				<div class="column">
					<label class="ui header">Sub-Category</label>
					<br>
				</div>
			</div>			
			<div class="row section">
				<div class="column">
					<a class="ui primary button" href="addsubcategory.php">Add Sub-Category</a>
					<br><br>
					<table class="ui table">
						<thead>
							<tr>
								<th>#</th>
								<th>Sub Category Name</th>
								<th>Category Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql="SELECT subcategory.id as id, subcategory.isAvailable as isAvailable, category.categoryName as categoryName, subcategory.subcategory as subcategoryName from category join subcategory on category.id=subcategory.categoryid";
								$query = mysqli_query($connection,$sql);
								$cnt=1;
								while($row=mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($row['subcategoryName']);?></td>
								<td><?php echo htmlentities($row['categoryName']);?></td>
								<td>
									<?php 
										if($row['isAvailable']){
									?>
										<label class="header">Available</label>
									<?php }else {
									?>
										<label class="header">Disabled</label>
									<?php } ?>
								</td>
								<td>
									<?php 
										if($row['isAvailable']){
									?>
									<a class="ui red icon button" title="Disable Category" href="deletesubcategory.php?subcat=<?php echo htmlentities($row['id']);?>&act=disable">
										<i class="lock icon"></i>
									</a>
									<?php }else {
									?>
									<a class="ui green icon button" title="Enable Category" href="deletesubcategory.php?subcat=<?php echo htmlentities($row['id']);?>&act=enable">
										<i class="unlock icon"></i>
									</a>
									<?php } ?>
									<a class="ui primary icon button" href="addsubcategory.php?subcat=<?php echo htmlentities($row['id']);?>">
										<i class="edit icon"></i>
									</a>
								</td>
							</tr>
							<?php $cnt=$cnt+1; } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row footer" align="center" style="padding: 10% !important;">
				<div class="column">
					Powered by Cousins Lab - 2017
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../assets/semantic-ui/dist/semantic.js"></script>
	<script type="text/javascript" src="../assets/js/owl.carousel.js"></script>
	<script type="text/javascript" src="../assets/datatables/media/js/jquery.dataTables.js"></script>	
	<script type="text/javascript" src="../assets/datatables/media/js/dataTables.semanticui.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
	<script type="text/javascript">
		$(".ui.table").DataTable();
	</script>
</body>
</html>