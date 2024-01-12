<?php
// error_reporting(0);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Kolkata');
define('BASE_URL', 'http://localhost/metronics-panel/');
define('BASE_URL_IMG', 'http://localhost/metronics-panel/images/');
$conn=mysqli_connect('localhost','root','','dinesh');
if(!$conn)
{
	die('Database Connection Failed !');
}

$date=date('d-m-Y').' '.date('h:m:s');

?>
