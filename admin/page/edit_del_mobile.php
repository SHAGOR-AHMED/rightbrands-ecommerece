<br /> 
<table class="table table-responsive table-bordered" bgcolor="#CAE8EA" width="100%" cellpadding="1px" cellspacing="1px">
	<thead class="text-center bg-info">
		<th class="text-center"><font color="#000000">ID</font></th>                               
		<th class="text-center"><font color="#000000">Title</font></th>
		<th class="text-center"><font color="#000000">Photo</font></th>
		<th class="text-center"><font color="#000000">Action</font></th>
	</thead>
	<tbody class="text-center">
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
			//select data from friends table
			$sql = "select * from `new_mobile` order by `id` desc";
			$data = mysql_query($sql);
			if(!$data){
				die('Data query failed:' . mysql_error());
			}
		?>
		<?php
			while($row = mysql_fetch_assoc($data)){ ?>
			<tr>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['id'].'</font>'; ?></td>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['title'].'</font>'; ?></td>
				<td bgcolor="#fff" align="center"><img src="image_upload/new_mobile/<?php echo $row['photo']; ?>" height="150px" width="200px" /></td>
				<td bgcolor="#fff" align="center">
					<a class="btn btn-info" href="home.php?area=page&&action=mobile_edit&&id=<?php echo $row['id']; ?>" title="click for edit">Edit</a>
				
					<a class="btn btn-danger" href="home.php?area=page&&action=edit_del_mobile&&id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')">Delete</a>
				</td>
			</tr>
		<?php } ?>
		<script>
			function chk() {
				var con = confirm('Are you sure ?');
				if (con) {
					return true;
				} else {
					return false;
				}
			}
		</script>
	</tbody>
</table>
<?php
if(isset($_GET['id'])){	//checking wheather any request or not ?
	$del_id=$_GET['id'];
	mysql_query("DELETE FROM `new_mobile` WHERE `id`='$del_id'") or die(mysql_error());
	$_SESSION['msg']="Deleted Successfully";
	header('Location:home.php?area=page&&action=edit_del_mobile');
}
?>