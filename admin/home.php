<?php 
ob_start();
include("page/connection.php"); 
include("page/config_menu.php");


session_start();
if(!isset($_SESSION['user'])){
	header('location:index.php');
	session_destroy();
}


if(@$_REQUEST['logid']=='logout'){
	unset($_SESSION['user']);
	session_destroy();
	header('location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<meta http-equiv="developer"cotent="Developed By: Ariful Islam Powered by : Gateway IT  Email:arif.cse.bstu@gmail.com "/>
<link href="../img/logo.jpg" rel="shortcut icon" type="image/x-icon" />
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/tablestyle.css" rel="stylesheet" type="text/css">
<link href="css/pagination.css" rel="stylesheet" type="text/css">
<script src="js/validation.js" type="text/javascript"></script>
    <!-- For Ajax   -->
	<script src="js/jquery-1.4.4.js"></script>
    <script src="js/jquery-ui-1.8.8.custom.min.js"></script>
    <!-- For Ajax   -->
</head>

<body>
<div id="wrapper">
<?php
include("page/header.php");
?>
<div id="main">
<?php
include("page/menu.php");

// Content Page Start---------------->

include($targetpage);

// Content Page End------------------>

?>
</div>
<?php


include("page/footer.php");
?>
</div>
  <?php
  ob_flush();
  ?>
</body>
</html>









