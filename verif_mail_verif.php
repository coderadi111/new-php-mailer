<?PHP
if(isset($_GET['code'])&& isset($_GET['usr']))
{
	require("includes/connection.php");
	$conn=$GLOBALS['conn'];
	$usrr=mysqli_real_escape_string($conn,$_GET['usr']);
	$cod=mysqli_real_escape_string($conn,$_GET['code']);
	   $sql="SELECT * FROM user_data WHERE email='$usrr'";
	  $res= mysqli_query($conn,$sql) or die("Error:".mysqli_error($con));   
	$row=mysqli_num_rows($res);
	if($row['verif_hash']==$cod)
	{
	 $sql="UPDATE `user_data` SET `verified` = '1' WHERE email='$usrr'";
	  $res= mysqli_query($con,$sql) or die("Error:".mysqli_error($con));   
		header("Location:error.php?msg=Account Verified+Successfully+:)");
	}
}else{
	header("Location:error.php?msg=Invalid+VErification+Code+Please+return+back");
}
	   ?>