<br />
<?php

if (isset($_REQUEST['submit']))
{
	extract($_REQUEST);
	if($_FILES["new_photo"]["size"]!=0||$_FILES["dis_photo"]["size"]!=0)
	{
		if($_FILES["new_photo"]["size"]!=0)
		{
			if($_FILES["dis_photo"]["size"]!=0)
			{
				// File Upload Start
				$errors1= array();
				$file_name1 = $_FILES['new_photo']['name'];
				$file_size1 =$_FILES['new_photo']['size'];
				$file_type1=$_FILES['new_photo']['type'];   
				$file_ext1=strtolower(end(explode('.',$_FILES['new_photo']['name'])));
				
				$expensions1= array("jpeg","jpg","png"); 		
				if(in_array($file_ext1,$expensions1)=== false){
					$errors1[]="Extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size1 > 2097152){
				$errors1[]='File size must be excately 2 MB';
				}				
				if(empty($errors1)==true){
					//unlink("image/product/".$_POST['original_photo-name']);
					move_uploaded_file($_FILES['new_photo']['tmp_name'], "image/slider/".$file_name1);
					//echo "Success";
				}else{
					print_r($errors1);
				}
				// File Upload End
				
				// File Upload Start
				$errors2= array();
				$file_name2 = $_FILES['dis_photo']['name'];
				$file_size2 =$_FILES['dis_photo']['size'];
				$file_type2=$_FILES['dis_photo']['type'];   
				$file_ext2=strtolower(end(explode('.',$_FILES['dis_photo']['name'])));
				
				$expensions2= array("jpeg","jpg","png"); 		
				if(in_array($file_ext2,$expensions2)=== false){
					$errors2[]="Extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size2 > 2097152){
				$errors2[]='File size must be excately 2 MB';
				}				
				if(empty($errors2)==true){
					//unlink("image/product/".$_POST['original_photo-name']);
					move_uploaded_file($_FILES['dis_photo']['tmp_name'], "image/slider/".$file_name2);
					
					mysql_query("UPDATE slider SET 
								slider_title='$new_title', 
								slider_desc='$new_slider_desc',
								image='$file_name1',
								discount_image='$file_name2'
								WHERE slider_id='$edit_id'") or die(mysql_error());
					
					echo "Update Success with both Image";
				}else{
					print_r($errors2);
				}
				// File Upload End
				
			}
			else
			{
				// File Upload Start
				$errors1= array();
				$file_name1 = $_FILES['new_photo']['name'];
				$file_size1 =$_FILES['new_photo']['size'];
				$file_type1=$_FILES['new_photo']['type'];   
				$file_ext1=strtolower(end(explode('.',$_FILES['new_photo']['name'])));
				
				$expensions1= array("jpeg","jpg","png"); 		
				if(in_array($file_ext1,$expensions1)=== false){
					$errors1[]="Extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size1 > 2097152){
				$errors1[]='File size must be excately 2 MB';
				}				
				if(empty($errors1)==true){
					//unlink("image/product/".$_POST['original_photo-name']);
					move_uploaded_file($_FILES['new_photo']['tmp_name'], "image/slider/".$file_name1);
					
					mysql_query("UPDATE slider SET 
								slider_title='$new_title', 
								slider_desc='$new_slider_desc',
								image='$file_name1'
								WHERE slider_id='$edit_id'") or die(mysql_error());
					
					echo "Update Success with Main Image";
				}else{
					print_r($errors1);
				}
				// File Upload End
			}
		}
		else
		{
			 	// File Upload Start
				$errors2= array();
				$file_name2 = $_FILES['dis_photo']['name'];
				$file_size2 =$_FILES['dis_photo']['size'];
				$file_type2=$_FILES['dis_photo']['type'];   
				$file_ext2=strtolower(end(explode('.',$_FILES['dis_photo']['name'])));
				
				$expensions2= array("jpeg","jpg","png"); 		
				if(in_array($file_ext2,$expensions2)=== false){
					$errors2[]="Extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size2 > 2097152){
				$errors2[]='File size must be excately 2 MB';
				}				
				if(empty($errors2)==true){
					//unlink("image/product/".$_POST['original_photo-name']);
					move_uploaded_file($_FILES['dis_photo']['tmp_name'], "image/slider/".$file_name2);
					
					mysql_query("UPDATE slider SET 
								slider_title='$new_title', 
								slider_desc='$new_slider_desc',
								discount_image='$file_name2'
								WHERE slider_id='$edit_id'") or die(mysql_error());
					
					echo "Update Success with Discount Image";
				}else{
					print_r($errors2);
				}
				// File Upload End
		}
	}

	else
	{
		mysql_query("UPDATE slider SET 
					slider_title='$new_title', 
					slider_desc='$new_slider_desc'
					WHERE slider_id='$edit_id'") or die(mysql_error());
		echo "Update Success without any Image";
	}
}

$edit_id=$_REQUEST['edit_id'];
//echo $edit_id;
$query2=mysql_query("SELECT * FROM slider WHERE slider_id=$edit_id");
$row=mysql_fetch_assoc($query2);
extract($row);
?>
<form name="slideredit" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <table style="font-weight:bold" align="center" border="0" cellpadding="1" cellspacing="1" width="70%">
      <tbody>
        <tr>
          <td colspan="2" align="left"><legend><span style="font-family:arial;font-size:12px"><b>Change Slider Description:</b></span></legend></td>
        </tr>
        <tr>
          <td width="40%" align="right">Slider Title : &nbsp;</td>
          <td width="60%" align="left"><input name="new_title" type="text" value="<?php echo $slider_title?>" /></td>
        </tr>
        <tr>
          <td align="right">Slider Description : &nbsp;</td>
          <td align="left"><textarea name="new_slider_desc" rows="6"><?php echo $slider_desc?></textarea></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="right">Main Image : &nbsp;<br />
            <img width="100px" height="100px" src="image/slider/<?php echo $image?>" /></td>
          <td align="left"><input type="file" name="new_photo" />
            <br />
            <span style="color:red;">Image must be jpg and size must be 484px X 441px.</span></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
		<tr>
          <td align="right">Discount Image : &nbsp;<br />
            <img width="100px" height="100px" src="image/slider/<?php echo $discount_image?>" /></td>
          <td align="left"><input type="file" name="dis_photo" />
            <br />
            <span style="color:red;">Image must be jpg and size must be 172px X 172px.</span></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td align="left"><input name="submit" class="btn btn-primary" id="submit" value="UPDATE" type="submit" /></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</form>
<br />
