<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
<link href="fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
<?php 
include 'pdo.php';
session_start();
if(isset($_POST['login'])&&($_POST['login'])){
$user=$_POST['Username'];
$pass=$_POST['Password'];
$sql="select * from account";
$acc=pdo_query($sql);
$check=0;
foreach($acc as $tk){
	extract($tk);
	if($user==$username&&$pass==$password&&$role=="admin") {
		$_SESSION['adminlogin']=array($username,$password,$fullname,$phone,$address,$role,$datesignup,$id);
		echo '<script>location.replace("server.php?TrangChu");</script>';
		$check=1;
		}
	}
	if($check!=1) {include 'LoginAdmin.php';
	echo '<script>document.getElementById("loginError").style.display="block";</script>';}
}
else if(isset($_GET['TrangChu'])){
	if(!isset($_SESSION['adminlogin'])) {
		include 'LoginAdmin.php';
	}
	else include 'admin.php';
}
else if(isset($_GET['category'])){
	if(!isset($_SESSION['adminlogin'])) {
		include 'LoginAdmin.php';
	}
	else include 'admin.php';
}
else {include 'LoginAdmin.php';}
?>
</body>
</html>
