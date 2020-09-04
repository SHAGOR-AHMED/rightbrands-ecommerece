<br />
<table class="table table-responsive table-bordered" bgcolor="#CAE8EA" border="0px" width="100%" cellpadding="1px" cellspacing="1px">
	<thead class="text-center bg-info">
		<th class="text-center"><font color="#000000">ID</font></th>                               
		<th class="text-center"><font color="#000000">Name</font></th>
		<th class="text-center"><font color="#000000">Date</font></th>
		<th class="text-center"><font color="#000000">Phone</font></th>
		<th class="text-center"><font color="#000000">Email</font></th>
		<th class="text-center"><font color="#000000">Message</font></th>
		<th class="text-center"><font color="#000000">Action</font></th>
	</thead>
	<tbody class="text-center">
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
			//select data from friends table
			$sql = "select * from `question` order by `id` desc";
			$data = mysql_query($sql);
			if(!$data){
				die('Data query failed:' . mysql_error());
			}
		?>
		<?php
			while($row = mysql_fetch_assoc($data)){ ?>
			<tr>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['id'].'</font>'; ?></td>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['name'].'</font>'; ?></td>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['date'].'</font>'; ?></td>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['phone'].'</font>'; ?></td>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['email'].'</font>'; ?></td>
				<td bgcolor="#fff"><?php echo '<font color="#000000">'.$row['message'].'</font>'; ?></td>
				<td bgcolor="#fff">
					<a class="btn btn-danger" href="home.php?area=page&&action=view_question&&id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')">Delete</a>
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
	mysql_query("DELETE FROM `question` WHERE `id`='$del_id'") or die(mysql_error());
	$_SESSION['msg']="Deleted Successfully";
	header('Location:home.php?area=page&&action=view_question');
}
?>