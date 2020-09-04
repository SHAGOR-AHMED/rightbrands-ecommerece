<?php 
ob_start();
include("page/connection.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
<meta http-equiv="developer"cotent="Developed By: Ariful Islam Powered by : Gateway IT  Email:arif.cse.bstu@gmail.com "/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login System</title>
<?php

	
	if(isset($_SESSION['user'])){
				header('location:home.php');
			}
			
?>
</head>

<body>
<?php
	
	if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
		
		$password2=sha1($password);
		
		$query=mysql_query("SELECT username,password FROM users WHERE username='$username' AND password='$password2' AND userstatus='active'") or die(mysql_error());
		
		if(mysql_num_rows($query)==1){
					session_start();
					$_SESSION['user']=$username;
			
			if(isset($_REQUEST['remember'])){
				$oneMonth = 60 * 60 * 24 * 30 + time();
				setcookie('username',$username,$oneMonth);
				setcookie('password',$password,$oneMonth);
				setcookie('userstatus',"active",$oneMonth);
				
			}
			
				header('location:home.php');
				
			
		}
	
		else{	

			$error= '<span style="color:red">Username or password not valid!</span>';	
		}
		
	}
		
	?>
<div align="center" class="well" style="width:400px; margin-top:150px; margin-left:auto; margin-right:auto;">
  <div style="text-align:center" class="alert alert-info"> Please login with your Username and Password. </div>
  <form action="index.php" method="post">
    <div data-original-title="Username" class="input-prepend" data-rel="tooltip" style="padding-bottom:5px"> <span class="add-on"><i class="icon-user"></i></span>
      <input type="text" autofocus="" name="username" id="username" placeholder="Your Username" required="required" >
    </div>
    <div data-original-title="Password" class="input-prepend" data-rel="tooltip" style="padding-bottom:5px"> <span class="add-on"><i class="icon-lock"></i></span>
      <input type="password" name="password" id="password" placeholder="Your Password" required="required">
    </div>
    <div>
      <div class="input-prepend" style="padding-bottom:5px">
        <label class="remember" for="remember"><span class="">
          <input id="remember" type="checkbox">
          </span>&nbsp;&nbsp;Remember me</label>
      </div>
    </div>
    <div>
      <button type="submit" name="submit" class="btn btn-primary">&nbsp;Login&nbsp;</button>
    </div>
  </form>
  <?php
  echo @$error;
  ob_flush();
  ?>
</div>
<!--/span-->

</body>
</html>