<script type='text/javascript'>
      function contentinfo()
      {
		  var s1=document.forms['newsform']['file'].value
		  if (s1=='')
		  {
			alert('Please, Select new Image !');
			return false;
		  }
       }
</script>

<?php

if(isset($_REQUEST['edit_without_image']))
	{
		extract($_REQUEST);
		mysql_query("UPDATE product SET 
		prod_name='$new_prod_name', 
		prod_price='$new_prod_price',
		status='$new_status'
		WHERE prod_id='$edit_id'") or die(mysql_error());
		
		echo "<script> alert('Update Successfully Without Image !'); </script>" ;
		
		//header("Location: home.php?area=page&&action=edit_del_products");

	}
	
	

if(isset($_REQUEST['submit']))
	{		
			extract($_REQUEST);
			$_FILES['file'];
			$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
			$ext = explode('.', basename($_FILES['file']['name']));//explode file name from dot(.) 
			$file_extension = end($ext); //store extensions in the variable
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
			$newfilename = md5(uniqid()) . "." . $ext[count($ext) - 1]; //set a new name of image
			$target_path = "image/product/"."$newfilename";//set the target path with new name of image
		
			if (($_FILES["file"]["size"]<1048576) && in_array($file_extension, $validextensions))  // 1 MB
			{
				if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
				{//if file moved to uploads folder
				unlink("image/product/".$_POST['original_photo_name']);
				mysql_query("UPDATE image SET
											image_name='".$newfilename."'
											WHERE image_id='".$image_id."'") or die(mysql_error());
				
				echo "<script> alert('Image uploaded successfully!.'); </script>" ;
				} 
				else 
				{//if file was not moved.
				echo "<script> alert('Please try again!.'); </script>" ;
				}
			} 
			else 
			{//if file size and file type was incorrect.
			echo "<script> alert('***Invalid file Size or Type***'); </script>" ;
			}
    	
	}


if(isset($_REQUEST['submit_new_image'])){
			extract($_REQUEST);
			$_FILES['file'];
			$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
			$ext = explode('.', basename($_FILES['file']['name']));//explode file name from dot(.) 
			$file_extension = end($ext); //store extensions in the variable
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
			$newfilename = md5(uniqid()) . "." . $ext[count($ext) - 1]; //set a new name of image
			$target_path = "image/product/"."$newfilename";//set the target path with new name of image
		
			if (($_FILES["file"]["size"]<1048576) && in_array($file_extension, $validextensions))  // 1 MB
			{
				if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
				{//if file moved to uploads folder
					
				$sql="INSERT INTO image VALUES(	'',
												'$image_prodid',
												'$newfilename',
												''
												)" ;
				
 				mysql_query($sql);
				//echo "Any Message" ;
				} 
				else 
				{//if file was not moved.
				echo "<script> alert('Please try again!.'); </script>" ;
				}
			} 
			else 
			{//if file size and file type was incorrect.
			echo "<script> alert('***Invalid file Size or Type***'); </script>" ;
			}

}

if(isset($_REQUEST['edit_id'])){
$edit_id=$_REQUEST['edit_id'];
$query=mysql_query("SELECT * FROM product WHERE prod_id=$edit_id") or die(mysql_error());
$rows=mysql_fetch_assoc($query);
extract($rows);

$imgquery=mysql_query("SELECT image.image_name, image.image_id, image.image_prodid FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$edit_id."'");
}

?>
<br />
<form name="newsform" action="" method="post">
<table width="353" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <th width="111" align="right" scope="row">Product Name :</th>
    <td width="219"><input type="text" name="new_prod_name" value="<?php echo $prod_name; ?>" /></td>
  </tr>
  <tr>
    <th align="right" scope="row">Price :</th>
    <td><input type="text" name="new_prod_price" value="<?php echo $prod_price; ?>" /></td>
  </tr>
  <tr>
    <th align="right" scope="row">Status :</th>
    <td><select name="new_status">
        <option <?php if($status == 1) echo "selected"; ?> value="1">Regular Product</option>
        <option <?php if($status == 2) echo "selected"; ?> value="2">Discount Product</option>
        </select></td>
  </tr>
    
  <tr>
    <th align="right" scope="row">&nbsp;</th>
    <td>
    <input type="submit" name="edit_without_image" value="Edit Without Image" /></td>
  </tr>
</table>
</form>
<br />
<br />

<table width="353" border="0" align="center" cellpadding="5" cellspacing="1">
  
  <?php
  while($img = mysql_fetch_row($imgquery))
  {
  ?>
 
  <tr>
  <form name="newsform" action="" method="post" enctype="multipart/form-data"  >
    <th align="right" scope="row"><img width="100px" height="100px" src="image/product/<?php echo $img[0];?>" /></th>
    <td>
    <input type="file" name="file" />
    <input type="hidden" name="original_photo_name" value="<?php echo $img[0];?>" />
    <input type="hidden" name="image_id" value="<?php echo $img[1];?>" />
    </td>
    <td><input type="submit" name="submit" value="Update" onclick="return(contentinfo());" /></td>
  </form>
  </tr>
  <?php
  $abc=$img[2];
  }
  if(mysql_num_rows($imgquery)<4)
  {
	  ?>
  	<form name="newsform" action="" method="post" enctype="multipart/form-data"  >
<?php
	echo '
	
  <tr>
    <th align="right" scope="row"></th>
    <td>
    <input type="file" name="file" />
    </td>
    <td><input type="submit" name="submit_new_image" value="Update" onclick="return(contentinfo());" /></td>
  </tr>
	  
	  ';
  }
  ?>
    <input type="hidden" name="image_prodid" value="<?php echo @$abc; ?>" />
    </form>

</table>

<br />
<br />