<?php
if (isset($_POST['submit'])) 
{
    $j = 0; //Variable for indexing uploaded image 
	//$target_path = "uploads/"; //Declaring Path for uploaded images		// No Need any More
    //for ($i = 0; $i < count($_FILES['file']['name']); $i++) 		// For Unlimited Image Upload
	    for ($i = 0; $i < 1; $i++) 									// For 2 Image Upload only
		{//loop to get individual element from the array
			$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
			$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
			$file_extension = end($ext); //store extensions in the variable
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
			$newfilename = md5(uniqid()) . "." . $ext[count($ext) - 1]; //set a new name of image
			$target_path = "image/product/"."$newfilename";//set the target path with new name of image
			$j = $j + 1;//increment the number of uploaded images according to the files in array       
		
			if (($_FILES["file"]["size"][$i] <1048576) && in_array($file_extension, $validextensions))  // 1 MB
			{
				if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) 
				{//if file moved to uploads folder
				
				$getid=mysql_query("SELECT MAX(prod_id) FROM product");
				$getproductid=mysql_fetch_row($getid);
				
				mysql_query("INSERT INTO image VALUES(	'',
														'$getproductid[0]', 
														'$newfilename',
														''
														)") or die(mysql_error("Something error"));
				echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
				} 
				else 
				{//if file was not moved.
				echo $j. ').<span id="error">please try again!.</span><br/><br/>';
				}
			} 
			else 
			{//if file size and file type was incorrect.
			echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
			}
    	}
}
?>