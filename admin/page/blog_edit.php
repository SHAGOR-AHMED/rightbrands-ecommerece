<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql="SELECT * FROM `blog` WHERE `id`='".$id."'";
		$data = mysql_query($sql);
		$info = mysql_fetch_assoc($data);
	}
?>
<br />
<form name="new_mbl" method="post" action="" enctype="multipart/form-data">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
    <tr>
		<td><strong>Title</strong></td>
		<td><input type="text" name="blog_title" id="blog_title" value="<?php echo $info['blog_title'];?>"/></td><br>
	</tr>
	<tr>
		<td><strong>Blog_details</strong></td>
		<td><textarea style="font-size: 16px; color: rgb(204, 0, 0);" name="blog_details" size="20" rows="4" cols="50" required><?php echo $info['blog_details'];?></textarea></td><br>
	</tr>
	<tr>
      <td><strong>Upload Image</strong></td>
	  <p><img src="image_upload/blog_image/<?php echo $info['photo']; ?>" height="150" width="150" /></p>
      <td width="1%"><input name="file" type="file" id="file"/><br>
					<input type="hidden" name="old_file" value="<?php echo $info['photo'] ?>" />
		** Only JPEG, JPG and PNG Type Image will be Uploaded. Image Size Should Be Less Than 100KB.
	  </td>
	</tr>
	<tr><td><br></td></tr>
    <tr><br>
        <td>&nbsp;</td>
        <td><input type="submit" value="Update Blog" name="update" id="upload" class="upload"/></td>
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
<?php
	if (isset($_POST['update'])) {
		$blog_title = $_POST['blog_title'];
		$blog_details = $_POST['blog_details'];
		$oldfile = $_POST['old_file'];
		if (!empty($_POST['file'])) {
			$file = $_POST['file'];
		}
		//file Upload
		/////////////////////
		$errors = array();
		$file_name = $_FILES['file']['name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
		$extension = array("jpeg", "jpg", "png", "pdf");
		if (!empty($_FILES['file']['name']) and in_array($file_ext, $extension) === false) {
			$errors[] = "extension not allowed, please choose a JPEG or PNG or PDF file.";
		}
		if ($file_size > 2097152) {
			$errors[] = 'File size must be excately 2 MB';
			exit();
		}
		if (!empty($_FILES['file']['name']) and file_exists("image_upload/blog_image/" . $_FILES['file']['name'])) {
			echo $_FILES["file"]["name"] . " already exists. ";
			exit();
		} else if (empty($errors) == true) {
			move_uploaded_file($file_tmp, "image_upload/blog_image/" . $file_name);
			echo 'uploaded successful';
		} else {
			print_r($errors);
		}
		/////////////////////

		if (!empty($file_name)) {
			//unlink($data['file']);
			$sql = "UPDATE  `blog` set `blog_title` = '".$blog_title."' ,`blog_details` = '".$blog_details."' , `photo` = '".$file_name."' where id= $id";
		} else {
			$sql = "UPDATE  `blog` set `blog_title` = '".$blog_title."' ,`blog_details` = '".$blog_details."', `photo` ='$info[photo]' where id= $id";
		}
		/* echo '<pre>';
		print_r($sql);
		echo '</pre>';
		exit(); */
		$rst = mysql_query($sql);
		if ($rst) {
			$_SESSION['msg'] = "Successfully Updated";
			unlink("image_upload/blog_image/".$oldfile);
			header('Location:home.php?area=page&&action=edit_del_blog&&msg='.$_SESSION['msg']);
		} else {
			$_SESSION['msg'] = "Failed to Update";
			header('Location:home.php?area=page&&action=edit_del_blog&&msg='.$_SESSION['msg']);
		}
		exit();
	}
?>