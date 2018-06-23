<?PHP
require("includes/connection.php");
$con=$GLOBALS['conn'];
if(isset($_POST['to']))
{
	$to=$_POST['to'];
   $subject =" USER EMAIL VERIFICATION";
   $message = "Thanks For Joining \n";
   $hash.=md5($to);
   $hash.=md5(mt_rand(99899,9989999));
   $message .= "Click On the Link BElow To VErify UR Account \n";
   $message .= "www.yourwebpage.xyz/verif_mail_verif.php?code=$hash&usr=$to";
   $header = "From:admin@yourwebpage.com";
   $retval = mail ($to,$subject,$message,$header);
   if( $retval == true )  
   {
	   $sql="INSERT INTO users('verif_hash') values('$hash') WHERE email='$to'";
	   mysqli_query($con,$sql) or die("Error:".mysqli_error($con));
     header("Location:error.php?msg=Mail+Sent+Successfully :)+");
   }
   else
   {
     header("Location:error.php?msg=Mail+Not+Sent+!+!+!++");
   }
}
else
{
	  header("Location:error.php?msg=Mail+Not+Sent+!+!+!++");
   
}
?>