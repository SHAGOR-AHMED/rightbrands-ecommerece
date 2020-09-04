<?php	

if(isset($_POST['submit_cat']))
	
	{
		extract($_REQUEST);	
		if($_POST['selected_category']==-1){
		
		$mess= "Please select any Category";
		
		}
		else{
	
			header("Location: home.php?area=page&&action=editsubcategorydetail&&cat_id=$selected_category");
		}
	}					
	
?>
<div style="padding:10px;">
<br />
<form name="addsubcategory" method="post" action="" onsubmit="return(validate());">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Select Categoty</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><select style="width:220px;" name="selected_category" id="type">
            <option value="-1" selected="selected">Select Category</option>
            <?php
				$query=mysql_query("SELECT * FROM category") or die(mysql_error());
				while($rows=mysql_fetch_assoc($query)){
				extract($rows);
				echo "<option value='$cat_id'>$category</option>";
						}
			 ?>
          </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><input class="btn btn-primary" name="submit_cat" value="Edit Sub Category" type="submit"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left" style="color:red; font-size:12px;"><?php echo @$mess;?></td>
      </tr>
    </tbody>
  </table>
</form>

</div>
