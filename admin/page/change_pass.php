<?php
if (isset($_REQUEST['submit'])){
$user = $_SESSION['user'];
$old_password = sha1($_POST['old_password']);
$new_password1 = sha1($_POST['new_password1']);
$new_password = sha1($_POST['new_password']);

$result = mysql_query("SELECT password FROM users WHERE username='$user'");

	if(!$result)
		{
		echo "&nbsp; The username entered does not exist!";		// THIS OPTION WILL PROPERLY WORK WHEN THERE WILL BW OPTION TO ENTER THE "USERNAME"
		}
	else 
	
	{
		if($old_password != mysql_result($result, 0))
			{
			echo "&nbsp; Entered an incorrect password";
			}
		else
			{
				if($new_password1 == $new_password)
					{
					$sql = mysql_query("UPDATE users SET password = '$new_password' WHERE username = '$user'");	
					
					echo "&nbsp; Congratulations, password successfully changed!";	
					}
					else
					{
					echo "&nbsp; New password and confirm password must be the same!";
					}
			}
	}
}
  ?>

<form name="frmpass" method="post" action="" onsubmit="return formvalidation(this)">
  <fieldset>
    <table style="font-weight:bold" align="center" border="0" cellpadding="1" cellspacing="1" width="70%">
      <tbody>
        <tr>
          <td colspan="2" align="left"><legend><span style="font-family:arial;font-size:12px"><b>Change My Password</b></span></legend></td>
        </tr>
        <tr>
          <td width="40%" align="right">Current Password :</td>
          <td width="60%" align="left"><input placeholder="--Current Password--" name="old_password" type="text" required="required" /></td>
        </tr>
        <tr>
          <td align="right">New Password :</td>
          <td align="left"><input placeholder="--New Password--" name="new_password1" type="text" required="required" /></td>
        </tr>
        <tr>
          <td align="right">Retype Password :</td>
          <td align="left"><input placeholder="--Retype Password--" name="new_password" type="text" required="required" /></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td align="left"><input name="submit" class="btn btn-primary" id="submit" value="Change Password" type="submit" /></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</form>