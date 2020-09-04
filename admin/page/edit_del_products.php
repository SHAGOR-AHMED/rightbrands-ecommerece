<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<?php
	if(isset($_REQUEST['del_id'])){		//checking wheather any request or not ?
	$del_id=$_REQUEST['del_id'];
	
	$query=mysql_query("SELECT * FROM image WHERE image_prodid='$del_id'") or die(mysql_error());
	while($rows=mysql_fetch_assoc($query))
	{
	extract($rows);
	unlink("image/product/".$image_name);
	}
	mysql_query("DELETE FROM product WHERE prod_id='$del_id'") or die(mysql_error());
	mysql_query("DELETE FROM image WHERE image_prodid='$del_id'") or die(mysql_error());
	echo "<script> alert('Deleted Successfully'); </script>" ;
}
?>

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
<br />
<br />
<form name="addproduct" method="post" action="" enctype="multipart/form-data">
  <table class="ltable" border="0" cellpadding="0" cellspacing="0" width="60%" align="center">
    <tbody>
      <tr>
        <td width="29%" align="right"><div align="right"><strong>Select Categoty</strong></div></td>
        <td width="3%">&nbsp;</td>
        <td width="63%"><?php print MakeCBOEx("select * from category","categoryfield","","","","onchange=\"selectdistrict(this.value,'DIS')\"","Select Category"); ?></td>
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
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left"><input class="btn btn-primary" name="submit" value="Search Product" type="submit"></td>
      </tr>
    </tbody>
  </table>
</form>

<?php
if(isset($_REQUEST['submit']))
{
	//extract($_REQUEST);		// It works if all the text are in English
	//mysql_query("INSERT INTO marquee SET message='$message', status='$status'") or die(mysql_error());
	$categoryfield = $_POST['categoryfield']; 
	$subcategory = $_POST['subcategory'];
	?>
    
<table class="mytable" cellspacing="1" width="100%" border="0" align="center">
  <tbody>
  <tr>
    <th class="nobg" scope="col">SN</th>
    <th scope="col">Photo</th>
    <th scope="col">Name</th>
    <th scope="col">Price</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
  </tr>
  <?php
  $x=0; 
  $query=mysql_query("SELECT * FROM product  WHERE prod_catid = '$categoryfield' and prod_subcatid = '$subcategory'") or die(mysql_error("Something error"));
	while($searchproduct=mysql_fetch_row($query))
	{
	extract($searchproduct);
	$x=$x+1;
	$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$searchproduct[0]."'");
	$img = mysql_fetch_row($imgquery);
	?>
  
  <tr>
    <th scope="row" class="specalt"><?php echo $x;?></th>
    <td><img width="100px" src="image/product/<?php echo $img[0];?>"</td>
    <td><?php echo $searchproduct[3];?></td>
    <td><?php echo $searchproduct[4];?></td>
    <td><?php if($searchproduct[6] == 1) echo "Regular Product"; 
	if($searchproduct[6] == 2) echo "Discount Product"; ?></td>
    <td><a href="home.php?area=page&&action=product_edit&&edit_id=<?php echo $searchproduct[0];?>">Edit</a>&nbsp;&nbsp;<a href="home.php?area=page&&action=edit_del_products&&del_id=<?php echo $searchproduct[0];?>" onclick='return checkDelete()'>Delete</a></td>
  </tr>

<?php
	}
}
?>
            <tr>
              <th colspan="6" scope="row" abbr=""></th>
            </tr>
          </tbody>
</table>
<br />



