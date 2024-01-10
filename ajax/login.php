<?php
include('../db/config.php');


$email_id=$_POST['email_id'];
$password=$_POST['password'];


$query=mysqli_query($conn,"select * from users where email_id='$email_id' and password='".md5($password)."' and is_active=1");


$record=mysqli_fetch_array($query);

$count=mysqli_num_rows($query);

if($count==1)
{
	$_SESSION['email_id']=$record['email_id'];
	$_SESSION['username']=$record['username'];
	header("location : ./dashboard.php");
}
else
{
	echo "login failed" ;
}


?>
