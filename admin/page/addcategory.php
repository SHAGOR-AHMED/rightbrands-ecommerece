<script type="text/javascript">

function validate()
{
   if( document.addsubcategory.selected_category.value == "-1" )
   {
     alert( "Please select any category!" );
     return false;
   }
   return( true );
}

</script>

<?php
if(isset($_REQUEST['submit']))
{
mysql_query("INSERT INTO category(
						category
						)
						VALUES
						( 
						  '".@$_POST["category"]."'
						)");
$mess = "Category Add Successfully !";
}
?>

<br />
<br />
<form name="newcategory" id="sms" method="post" action="">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>New Categoty</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><input style="font-size: 16px; color: rgb(204, 0, 0);" name="category" size="20" maxlength="14" type="text" required="required"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><input class="btn btn-primary" name="submit" id="submit" value="Add Category" type="submit"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><?php echo @$mess;?></td>
      </tr>
    </tbody>
  </table>
</form>
<br />
<br />

<?php
if(isset($_REQUEST['submit_cat']))
{
mysql_query("INSERT INTO subcategory(
						subcat_catid,
						subcategory
						)
						VALUES
						( 
						  '".@$_POST["selected_category"]."',
						  '".@$_POST["subcategory"]."'
						)");
	
$mess1 = "Sub Category Add Successfully !";
}
?>
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
        <td width="29%" align="right"><div align="right"><strong>Sub Categoty </strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><input style="font-size: 16px; color: rgb(204, 0, 0);" name="subcategory" size="20" maxlength="14" type="text" required="required"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><input class="btn btn-primary" name="submit_cat" value="Add Sub Category" type="submit"></td>
      </tr>
            <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><?php echo @$mess1;?></td>
      </tr>
    </tbody>
  </table>
</form>