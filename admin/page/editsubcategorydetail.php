<?php	
	
	if(isset($_REQUEST['s_id'])){
		$id=$_REQUEST['s_id'];						
		//$query=mysql_query("SELECT * FROM marquee") or die(mysql_error());
		$query=mysql_query("SELECT * FROM subcategory WHERE subcat_id=$id");
		$rows1=mysql_fetch_row($query);	
		
		//echo $rows[1];
	}
	//Update code start
	if(isset($_POST['btnEdit'])){
		$id=$_REQUEST['id'];
		$message = $_POST['message'];
		$cat_id = $_POST['cat_id']; 
		extract($_REQUEST);
		mysql_query("UPDATE subcategory SET subcategory='$message' WHERE subcat_id=$id") or die(mysql_error());
		$mess= "1";
		header("Location: home.php?area=page&&action=editsubcategorydetail&&cat_id=$cat_id&&mess=$mess");
	}					
	
?>

<div style="padding:10px;">
<br />
<table align='center' width='90%' border='0'>
    <tr bgcolor='#abcdef'>
      <td width="10%"><b>ID</b></td>
      <td width="70%"><b>Sub Categoty</b></td>
      <td width="20%"><b>Edit</b></td>
    </tr>
		<?php	
			$x=0;
            $query=mysql_query("SELECT * FROM subcategory WHERE subcat_catid='".@$_REQUEST['cat_id']."'") or die(mysql_error());
            while($rows=mysql_fetch_row($query)){
            //extract($rows);
        ?>

		  <tr style='background:#becde2;' valign='middle'>
			<td style='padding:2px;'><?php echo $x=$x+1;?></td>
			<td style='padding:2px;'><?php echo $rows[2];?></td>
			<td><a href='home.php?area=page&&action=editsubcategorydetail&&s_id=<?php echo $rows[0];?>&&cat_id=<?php echo $rows[1];?>'>Edit</a></td>
		  </tr>
			<?php
            }
            ?>
	
</table>
<br />
<br />


<form name="marquee" method="post" action="">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
      <tr>
        <td width="29%" align="right" valign="top"><div align="right"><strong>Message</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><textarea name="message" rows="3" rows="10" id="message" ><?php echo @$rows1[2]; ?></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><p>
        	<input type="hidden" name="cat_id" value="<?php echo @$_REQUEST['cat_id']; ?>" />
            <input type="hidden" name="id" value="<?php echo @$rows1[0]; ?>" />
            <input class="btn btn-primary" name="btnEdit" id="btnEdit" value="Update Message" type="submit">
            
          </p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left" style="color:red;"><?php if(@$_GET['mess']==1){echo "Update Successfully!";};?></td>
      </tr>
    </tbody>
  </table>
</form>
</div>
