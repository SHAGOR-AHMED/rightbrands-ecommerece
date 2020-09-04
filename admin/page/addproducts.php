<script type="text/javascript">
		function selectdistrict(dID,SELECTDIS)
		{
			//alert (dID);
			//alert (SELECTDIS);
			$.post("page/changediv.php",{ func : SELECTDIS , src : dID } ,
			function (data){
				$('#subcategory').html(data);
				} ,"JSON")
		}
</script>
<?php
if(isset($_REQUEST['submit']))
{
	//extract($_REQUEST);		// It works if all the text are in English
	//mysql_query("INSERT INTO marquee SET message='$message', status='$status'") or die(mysql_error());
	$categoryfield = $_POST['categoryfield']; 
	$subcategory = $_POST['subcategory'];
	$productname = $_POST['productname'];
	$productprice = $_POST['productprice'];
	$prod_desc = $_POST['prod_desc'];
	$status = $_POST['status'];
	$prod_code = $_POST['prod_code'];
	
	
	$query=mysql_query("INSERT INTO product  VALUES(	'',
														'$categoryfield', 
														'$subcategory', 
														'$productname',
														'$productprice',
														'$prod_desc',
														'$status',
														'$prod_code'
														)") or die(mysql_error("Something error"));
	
	$mess="Product Added Successfully !";
		//header("location:userregistration.php?am=$mess");		// If we want to send $mess to other page

}

?>
<br />
<br />


<form name="addproduct" method="post" action="" enctype="multipart/form-data">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Select Categoty</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%">
		<?php print MakeCBOEx("select * from category","categoryfield","","","","onchange=\"selectdistrict(this.value,'DIS')\"","Select Category"); ?></td>
      </tr>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Select Sub Categoty</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td id="subcategory" width="63%">
        <select>
        <option>Select Sub Categoty</option>
        </select></td>
      </tr>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Product Name</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><input style="font-size: 16px; color: rgb(204, 0, 0);" name="productname" size="20"  type="text" required></td>
      </tr>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Price</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><input style="font-size: 16px; color: rgb(204, 0, 0);" name="productprice" size="20" type="text" required></td>
      </tr>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Product Type</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%">
        <select name="status">
        <option value="1" selected="selected">Regular Product</option>
        <option value="2">Discount Product</option>
        </select></td>
      </tr>
	  <tr>
        <td width="29%" align="right"><div align="right"><strong>Product Details</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><textarea style="font-size: 16px; color: rgb(204, 0, 0);" name="prod_desc" size="20" col="5" rows="5" required></textarea></td>
      </tr>
	  <tr>
        <td width="29%" align="right"><div align="right"><strong>Product Code</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><input style="font-size: 16px; color: rgb(204, 0, 0);" name="prod_code" size="20"  type="text" required></td>
      </tr>
      <!--<tr>
        <td width="29%" align="right"><div align="right"><strong>Product Color</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><input style="font-size: 16px; color: rgb(204, 0, 0);" name="prod_color" size="20"  type="text" required></td>
      </tr> -->
      
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Upload Image</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><div id="maindiv">
        

      ** Only JPEG, JPG and PNG Type Image will be Uploaded. Image Size Should Be Less Than 100KB and also 4 Image only.

      <div id="filediv">
      <input name="file[]" type="file" id="file"/>
      </div>
      <br/>
      <input type="button" id="add_more" class="upload" value="Add More Files"/>
      
      
      

    <br/>
    <br/>
    <!-------Including PHP Script here------>
    <?php include"image_upload/upload.php"; ?>
  </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><input type="submit" value="Add Product" name="submit" id="upload" class="upload"/></td>
      </tr>
       <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><?php echo @$mess;?></td>
      </tr>
    </tbody>
  </table>
</form>

<!-------File Upload Start------>
<?php /*?><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><?php */?>
<script src="image_upload/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="image_upload/css/style.css">
<!-------File Upload End------>