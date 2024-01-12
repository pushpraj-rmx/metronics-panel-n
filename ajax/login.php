<?php
sleep(1);
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
	$attr=array('status'=>'success','msg'=>'Login Successfull !');
	header('Location: ../');
}
else
{
	$attr=array('status'=>'error','msg'=>'Enter a valid Email ID or Password');
}


echo json_encode($attr);

?>
