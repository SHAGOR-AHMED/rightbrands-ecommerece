<br />
<form name="new_mbl" method="post" action="" enctype="multipart/form-data">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
    <tr>
		<td><strong>Title</strong></td>
		<td><input type="text" name="title" id="title" value=""/></td><br>
	</tr>
	<tr>
        <td><strong>Upload Image</strong></td>
      <td width="1%"><input name="file" type="file" id="file"/><br>
			** Only JPEG, JPG and PNG Type Image will be Uploaded. Image Size Should Be Less Than 100KB.
	  </td>
	</tr>
	<tr><td><br></td></tr>
    <tr><br>
        <td>&nbsp;</td>
        <td><input type="submit" value="Add Product" name="submit" id="upload" class="upload"/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><?php echo @$mess;?></td>
    </tr>
    </tbody>
  </table>
</form>
<br/>
<!-------photo upload------>
<?php
  if(isset($_POST['submit'])){
	$title = $_POST['title'];
	//file Upload
	/////////////////////
	$errors = array();
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
	$extension = array("jpeg","jpg","png","pdf");
	if(in_array($file_ext,$extension) === false){
	  $errors[] = "extension not allowed, please choose a JPEG or PNG or PDF file.";
	}
	if($file_size > 2097152){
	  $errors[] = 'File size must be excately 2 MB';
	}
	if(file_exists("image_upload/new_cosmetic/" . $_FILES['file']['name'])){
	  echo $_FILES["file"]["name"] . " already exists. ";
	}else if(empty($errors) == true){
	  move_uploaded_file($file_tmp,"image_upload/new_cosmetic/".$file_name);
	  echo 'uploaded successful';
	}
	else{
	  print_r($errors);
	}
	/////////////////////
	
	if(!empty($file_name)){
	  $sql="insert into `new_cosmetic` (`title`,`photo`) values ('".$title."','".$file_name."')";
	}else{
	  $sql="insert into `new_cosmetic` (`title`) values ('".$title."')";
	}
	/* echo '<pre>';
	print_r($sql);
	echo '</pre>';
	exit(); */
	$rst = mysql_query($sql);
	if($rst){
	  $mess="Cosmetic Added Successfully !";
	}else{
	  $mess="Failed to upload !";
	}
  }
?>
<!-------File Upload Start------>
<?php /*?><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><?php */?>
<script src="image_upload/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="image_upload/css/style.css">
<!-------File Upload End------>