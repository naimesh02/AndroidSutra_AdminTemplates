<?php
	include('conn.php');			
	session_start();
	?>
	<script>
			var conf=confirm('Are you sure to delete record?');
			if(conf==true){
			<?php
	if(isset($_GET["id"]))
	{
			$sql="DELETE FROM `tblcategorydetails` WHERE id='".$_GET["id"]."'";
			$qry=mysqli_query($conn,$sql);
			if($qry){
				header("Location:./ViewCategoryDetails.php");
			exit();
			}
			}
			else
			{
				echo "error";
			}
			?>
			
			}
			</script>
		